<?php
declare(strict_types=1);
namespace Controller_client;

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

require_once(get_model_dir() . '/model.php');
use function Model\get_csv_path;
use function Model\read_table;
use function Model\get_web_service;
use function Model\get_images;
use function Model\add_comment;

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

    $index_body = render_template(get_template_path("/body/client/index"), []);
    $index_view = render_template(get_template_path('/skeleton/skeleton'),
                                 ['title' => 'WebApp - Diari Deportiu',
                                  'body'  => $index_body]);

    $response   = new Response($index_view);
    return [$response, $context];
}

// ----------------------------------------------------------------------------
function blog(Request $request, Context $context): array {

    if ($request->method == 'POST') {
        $user  = $request->parameters['user'];
        $comment  = $request->parameters['comment'];

        add_comment( get_csv_path('comments_blog'), $user, $comment);
    }

    // 1. Get data
    $blog = read_table(get_csv_path('blog'));

    $comments_blog = read_table(get_csv_path('comments_blog'));

    // 2. Prettify data
    $pretty_blog = prettify_blog($blog);

    // 3. Fill template with data
    $blog_body = render_template(get_template_path('/body/client/blog'),
                                 ['blog_table'    => $pretty_blog,
                                  'comments_blog' => $comments_blog]);
    $blog_view = render_template(get_template_path('/skeleton/skeleton'),
                                 ['title' => 'Blog',
                                  'body'  => $blog_body]);

    // 4. Return response
    $response = new Response($blog_view);
    return [$response, $context];
}

// ----------------------------------------------------------------------------
function gallery(Request $request, Context $context): array {

    if ($request->method == 'POST') {
        $user  = $request->parameters['user'];
        $comment  = $request->parameters['comment'];

        add_comment( get_csv_path('comments_gallery'), $user, $comment);
    }

    // 1. Get data
    $champions_images = get_images("gallery/Champions");
    $worlcup_images = get_images("gallery/WorldCup");
    $goldenboy_images = get_images("gallery/GoldenBoy");
    $goldenball_images = get_images("gallery/GoldenBall");

    $comments_gallery = read_table(get_csv_path('comments_gallery'));

    $gallery_body = render_template(get_template_path('/body/client/gallery'), 
                                    ['champions_array' => $champions_images,
                                     'worldcup_array' => $worlcup_images,
                                     'goldenboy_array' => $goldenboy_images,
                                     'goldenball_array' => $goldenball_images,
                                     'comments_gallery' => $comments_gallery]);
    $gallery_view = render_template(get_template_path('/skeleton/skeleton'),
                                 ['title' => 'Galeria',
                                  'body'  => $gallery_body]);

    $response = new Response($gallery_view);
    return [$response, $context];
}

// ----------------------------------------------------------------------------
function data(Request $request, Context $context): array {

    if ($request->method == 'POST') {
        $user  = $request->parameters['user'];
        $comment  = $request->parameters['comment'];

        add_comment( get_csv_path('comments_data'), $user, $comment);
    }

    // 1. Get data
    $team_table = read_table(get_csv_path('liga'));

    $comments_table = read_table(get_csv_path('comments_data'));

    // 2. Fill template with data
    $data_body = render_template(get_template_path('/body/client/data'),
                                ['team_table' => $team_table,
                                'comments_table' => $comments_table]);

    $data_view = render_template(get_template_path('/skeleton/skeleton'),
                                ['title' => 'Data',
                                'body'  => $data_body]);

    $response  = new Response($data_view);
    

    return [$response, $context];
}

// ----------------------------------------------------------------------------
function web_service(Request $request, Context $context): array {

    // 1. Get data
    $web_array = get_web_service();

    $comments_web_service = read_table(get_csv_path('comments_web_service'));

    $web_service_body = render_template(get_template_path('/body/client/web-service'),
                                 ['web_array' => $web_array,
                                  'comments_web_service' => $comments_web_service]);
                                 
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