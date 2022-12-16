<?php
declare(strict_types=1);
namespace Controller;

require_once(realpath(__DIR__ . '/../model/model.php'));
use function Model\get_csv_path;
use function Model\read_table;
use function Model\get_images;
use function Model\get_blog_contents;
use function Model\get_news;
use function Model\get_web_service_data;

require_once(realpath(__DIR__ . '/../view/viewlib.php'));
use function View\get_template_path;

require_once(realpath(__DIR__ . '/../../vendor/utils/utils.php'));
use function Utils\render_template;



// ############################################################################
// Route handlers
// ############################################################################

// ----------------------------------------------------------------------------
function index(): string {

    $index_body = render_template(get_template_path('/body/index'), []);
    $index_view = render_template(get_template_path('/skeleton/skeleton'),
                                 ['title' => 'WebApp',
                                  'body'  => $index_body]);
    return $index_view;
}

// ----------------------------------------------------------------------------
function blog(): string {

    $news_array = get_news();

    $blog_body = render_template(get_template_path('/body/blog'), 
                                  ['news_array' => $news_array]);
    $blog_view = render_template(get_template_path('/skeleton/skeleton'),
                                 ['title' => 'Blog',
                                  'body'  => $blog_body]);
    return $blog_view;
}

// ----------------------------------------------------------------------------
function gallery(): string {

    // 1. Get data
    $web_links = get_images();

    // 2. Fill template with data
    $gallery_body = render_template(get_template_path('/body/gallery'),
                                     ['images_array' => $web_links]);

    $gallery_view = render_template(get_template_path('/skeleton/skeleton'),
                                 ['title' => 'Gallery',
                                  'body'  => $gallery_body]);
    return $gallery_view;
}

// ----------------------------------------------------------------------------
function table(): string {

    // 1. Get data
    $football_table = read_table(get_csv_path('liga - Hoja 1'));

    // 2. Fill template with data
    $data_body = render_template(get_template_path('/body/table'),
                                 ['football_table' => $football_table]);

    $data_view = render_template(get_template_path('/skeleton/skeleton'),
                                 ['title' => 'Table',
                                  'body'  => $data_body]);
    return $data_view;
}


// ----------------------------------------------------------------------------
function web_service(): string {

    // 1. Get data
    $webs_array = get_web_service_data();

    // 2. Fill template with data
    $web_service_body = render_template(get_template_path('/body/web-service'),
                                 ['webs_array' => $webs_array]);

    $web_service_view = render_template(get_template_path('/skeleton/skeleton'),
                                 ['title' => 'Web-Service',
                                  'body'  => $web_service_body]);
    return $web_service_view;
}


// ----------------------------------------------------------------------------
function error_404(string $request_path): string {

    http_response_code(404);

    $error404_body = render_template(get_template_path('/body/error404'),
                                     ['request_path' => $request_path]);

    $error404_view = render_template(get_template_path('/skeleton/skeleton'),
                                 ['title' => 'Not found',
                                  'body'  => $error404_body]);

    return $error404_view;
}