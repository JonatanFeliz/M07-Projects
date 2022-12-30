<?php
declare(strict_types=1);
namespace Controller;

require_once(__DIR__ . '/../config.php');
use function Config\get_lib_dir;
use function Config\get_model_dir;
use function Config\get_view_dir;

require_once(get_lib_dir() . '/request/request.php');
use Request\Request;

require_once(get_lib_dir() . '/context/context.php');
use Context\Context;

require_once(get_lib_dir() . '/response/response.php');
use Response\Response;

require_once(get_model_dir() . '/model.php');
use function Model\get_csv_path;
use function Model\read_table;
use function Model\add_blog_message;
use function Model\get_images;

require_once(get_view_dir() . '/view.php');
use function View\get_template_path;
use function View\render_template;
use function View\prettify_blog;



// ############################################################################
// Route handlers
// ############################################################################
// All controller functions receive $request, whether they use it or not.

// ----------------------------------------------------------------------------
function index(Request $request, Context $context): array {

    $index_body = render_template(get_template_path('/body/visitant/index'), []);
    $index_view = render_template(get_template_path('/skeleton/skeleton'),
                                 ['title' => 'WebApp - Diari Deportiu',
                                  'body'  => $index_body]);

    $response   = new Response($index_view);
    return [$response, $context];
}

// ----------------------------------------------------------------------------
function blog(Request $request, Context $context): array {

    // 1. If request is POST, add data
    if ($request->method == 'POST') {
        add_blog_message( get_csv_path('blog'), $request->parameters['message'] );
    }

    // 2. Get data
    $blog = read_table(get_csv_path('blog'));

    // 3. Prettify data
    $pretty_blog = prettify_blog($blog);

    // 4. Fill template with data
    $blog_body = render_template(get_template_path('/body/visitant/blog'),
                                 ['blog_table' => $pretty_blog]);
    $blog_view = render_template(get_template_path('/skeleton/skeleton'),
                                 ['title' => 'Blog',
                                  'body'  => $blog_body]);

    // 5. Return response
    $response = new Response($blog_view);
    return [$response, $context];
}

// ----------------------------------------------------------------------------
function gallery(Request $request, Context $context): array {

    // 1. Get data
    $web_links = get_images("gallery");

    $gallery_body = render_template(get_template_path('/body/visitant/gallery'), 
                                    ['images_array' => $web_links]);
    $gallery_view = render_template(get_template_path('/skeleton/skeleton'),
                                 ['title' => 'Galeria',
                                  'body'  => $gallery_body]);

    $response = new Response($gallery_view);
    return [$response, $context];
}

// ----------------------------------------------------------------------------
function data(Request $request, Context $context): array {

    // 1. Get data
    $manga_table = read_table(get_csv_path('liga'));

    // 2. Fill template with data
    $data_body = render_template(get_template_path('/body/visitant/data'),
                                 ['manga_table' => $manga_table]);

    $data_view = render_template(get_template_path('/skeleton/skeleton'),
                                 ['title' => 'Data',
                                  'body'  => $data_body]);

    $response = new Response($data_view);
    
    return [$response, $context];
}

// ----------------------------------------------------------------------------
function login(Request $request, Context $context): array {

   
    if       ($request->method == 'GET') {
       
        $login_body = render_template(get_template_path('/body/login'),[]);
        $login_view = render_template(get_template_path('/skeleton/skeleton'),
                                      ['title' => 'Login',
                                       'body'  => $login_body]);

        $response = new Response($login_view);
        return [$response, $context];
                                   
    } elseif ($request->method == 'POST'){

        $username = $request->parameters['username'];
        $password = $request->parameters['password'];

        $response = new Response($username . PHP_EOL . $password . PHP_EOL);
        return [$response, $context];
    }

}

// ----------------------------------------------------------------------------
function register(Request $request, Context $context): array {
    if       ($request->method == 'GET') {
       
        $login_body = render_template(get_template_path('/body/register'),[]);
        $login_view = render_template(get_template_path('/skeleton/skeleton'),
                                      ['title' => 'Registre',
                                       'body'  => $login_body]);

        $response = new Response($login_view);
        return [$response, $context];
    }
}

// ----------------------------------------------------------------------------
function web_service(Request $request, Context $context): array {

    $web_service_body = render_template(get_template_path('/body/visitant/web-service'), []);
    $web_service_view = render_template(get_template_path('/skeleton/skeleton'),
                                 ['title' => 'Data',
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
