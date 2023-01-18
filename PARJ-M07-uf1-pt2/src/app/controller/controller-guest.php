<?php
declare(strict_types=1);
namespace Controller_guest;

require_once(__DIR__ . '/../config.php');
use function Config\get_lib_dir;
use function Config\get_model_dir;
use function Config\get_view_dir;
use function Controller\login as ControllerLogin;

require_once(get_lib_dir() . '/request/request.php');
use Request\Request;

require_once(get_lib_dir() . '/context/context.php');
use Context\Context;

require_once(get_lib_dir() . '/response/response.php');
use Response\Response;

require_once(get_lib_dir() . '/table/table.php');
use Table\Table;

require_once(get_model_dir() . '/model.php');
use function Model\get_csv_path;
use function Model\read_table;
use function Model\add_new_user;
use function Model\get_web_service;
use function Model\get_images;

require_once(get_view_dir() . '/view.php');
use function View\get_template_path;
use function View\render_template;
use function View\prettify_blog;



// ############################################################################
// Helper functions
// ############################################################################

// ----------------------------------------------------------------------------
function check_login(Table $user_table, string $user_name, string $user_pass): bool {

    $get_user_row = fn ($row) => (($row['Username'] . $row['Password']) == ($user_name . $user_pass));
    $filtered_table  = $user_table->filterRows($get_user_row);

    $login_ok = (count($filtered_table->body) == 1);

    return $login_ok;
}

// This function will crash if $username does not exist. First use check_login().
// ----------------------------------------------------------------------------
function get_user_role(Table $user_table, string $user_name): string {

    $get_user_row   = fn ($row) => ($row['Username'] == $user_name);
    $filtered_table = $user_table->filterRows($get_user_row);
    $user_row       = $filtered_table->body[0];
    $user_role      = $user_row['Rol'];

    return $user_role;
}

// ############################################################################
// Route handlers
// ############################################################################
// All controller functions receive $request, whether they use it or not.

// ----------------------------------------------------------------------------
function index(Request $request, Context $context): array {

    $template_path = "/body/guest/index";

    if ($context->role != "guest") {
        $template_path = "/body/index";
    }

    $index_body = render_template(get_template_path($template_path), []);
    $index_view = render_template(get_template_path('/skeleton/skeleton'),
                                 ['title' => 'WebApp - Diari Deportiu',
                                  'body'  => $index_body]);

    $response   = new Response($index_view);
    return [$response, $context];
}

// ----------------------------------------------------------------------------
function blog(Request $request, Context $context): array {

    // 1. Get data
    $blog = read_table(get_csv_path('blog'));

    // 2. Prettify data
    $pretty_blog = prettify_blog($blog);

    // 3. Fill template with data
    $blog_body = render_template(get_template_path('/body/guest/blog'),
                                 ['blog_table' => $pretty_blog]);
    $blog_view = render_template(get_template_path('/skeleton/skeleton'),
                                 ['title' => 'Blog',
                                  'body'  => $blog_body]);

    // 4. Return response
    $response = new Response($blog_view);
    return [$response, $context];
}

// ----------------------------------------------------------------------------
function gallery(Request $request, Context $context): array {

    // 1. Get data
    $champions_images = get_images("gallery/Champions");
    $worlcup_images = get_images("gallery/WorldCup");
    $goldenboy_images = get_images("gallery/GoldenBoy");
    $goldenball_images = get_images("gallery/GoldenBall");

    $gallery_body = render_template(get_template_path('/body/guest/gallery'), 
                                    ['champions_array' => $champions_images,
                                     'worldcup_array' => $worlcup_images,
                                     'goldenboy_array' => $goldenboy_images,
                                     'goldenball_array' => $goldenball_images]);
    $gallery_view = render_template(get_template_path('/skeleton/skeleton'),
                                 ['title' => 'Galeria',
                                  'body'  => $gallery_body]);

    $response = new Response($gallery_view);
    return [$response, $context];
}

// ----------------------------------------------------------------------------
function data(Request $request, Context $context): array {

    // 1. Get data
    $team_table = read_table(get_csv_path('liga'));

    // 2. Fill template with data
    $data_body = render_template(get_template_path('/body/guest/data'),
                                ['team_table' => $team_table]);

    $data_view = render_template(get_template_path('/skeleton/skeleton'),
                                ['title' => 'Data',
                                'body'  => $data_body]);

    $response  = new Response($data_view);
    

    return [$response, $context];
}

// ----------------------------------------------------------------------------
function login(Request $request, Context $context): array {

   
    if($request->method == 'GET') {
       
        $login_body = render_template(get_template_path('/body/login'),[]);
        $login_view = render_template(get_template_path('/skeleton/skeleton'),
                                      ['title' => 'Login',
                                       'body'  => $login_body]);

        $response = new Response($login_view);
        return [$response, $context];
                                   
    } elseif ($request->method == 'POST'){

        $username = $request->parameters['username'];
        $password = $request->parameters['password'];

        // 1. Check against users DB
        $user_table = read_table(get_csv_path('users'));
        $login_ok   = check_login($user_table, $username, $password);

        // A. If login ok
        if ($login_ok) {

            // Change context
            $context->logged_in = true;
            $context->name = $username;
            $context->role = get_user_role($user_table, $username);

            // Set redirection
            $response = new Response();
            $response->set_redirection('/index');

        // B. If login failed
        } else {

            // Set redirection only
            $response = new Response();
            $response->set_redirection('/login');
        }

        return [$response, $context];
    }

}

// ----------------------------------------------------------------------------
function register(Request $request, Context $context): array {

    if($request->method == 'GET') 
    {
       
        $login_body = render_template(get_template_path('/body/register'),[]);
        print_r("houula");
        $login_view = render_template(get_template_path('/skeleton/skeleton'),
                                      ['title' => 'Registre',
                                       'body'  => $login_body]);

        $response = new Response($login_view);
        return [$response, $context];
    }

    elseif ($request->method == 'POST') 
    {
        $username = $request->parameters['r_username'];
        $password = $request->parameters['r_password'];
        $role     = $request->parameters['role'];

        //add user to csv
        add_new_user(get_csv_path('users'), $username, $password, $role);

        //redirect to login
        $response = new Response();
        $response->set_redirection('/login');

        return [$response, $context];
    }
}

// ----------------------------------------------------------------------------
function web_service(Request $request, Context $context): array {

    // 1. Get data
    $web_array = get_web_service();

    $web_service_body = render_template(get_template_path('/body/guest/web-service'),
                                 ['web_array' => $web_array]);
                                 
    $web_service_view = render_template(get_template_path('/skeleton/skeleton'),
                                 ['title' => 'Web Service',
                                  'body'  => $web_service_body]);

    $response = new Response($web_service_view);
    return [$response, $context];
}

// ----------------------------------------------------------------------------
function error_404(Request $request, Context $context): array {

    $error404_body = render_template(get_template_path('/body/error404'),
                                     ['request_path' => $request->path]);

    $error404_view = render_template(get_template_path('/skeleton/skeleton'),
                                 ['title' => 'Not found',
                                  'body'  => $error404_body]);

    $response = new Response($error404_view, 404);
    return [$response, $context];
}

// ----------------------------------------------------------------------------
function logout(Request $request, Context $context): array {

    // Change context
    $context->logged_in = false;
    $context->name = '';
    $context->role = '';

    // Set redirection
    $response = new Response();
    $response->set_redirection('/index');

    return [$response, $context];

}