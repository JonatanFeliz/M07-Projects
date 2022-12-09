<?php
declare(strict_types=1);
namespace Model;

require_once(realpath(__DIR__ . '/../../vendor/table/table.php'));
use Table\Table;

require_once(realpath(__DIR__ . '/../../vendor/utils/utils.php'));
use function Utils\join_paths;
use function Utils\read_json;



// ############################################################################
// Table functions
// ############################################################################

// Example: '/manga' => '/app/db/manga.csv'
// ----------------------------------------------------------------------------
function get_csv_path(string $csv_id): string {

    $csv_suffix        = '.csv';
    $csv_relative_path = $csv_id . $csv_suffix;

    $db_dir        = realpath(join_paths(__DIR__, '/../../db'));
    $csv_full_path = join_paths($db_dir, $csv_relative_path);

    return $csv_full_path;
}

// ----------------------------------------------------------------------------
function read_table(string $csv_filename): Table {

    $data = Table::readCSV($csv_filename);
    return $data;
}
// ############################################################################
// Gallery functions
// ############################################################################

//-----------------------------------------------------------------------------
function get_images(): array {
    $path = __DIR__ . "/../../public/img/galery/*";

    $path_image_array = glob($path);

    $web_links = array();

    foreach ($path_image_array as $image) {
        $filename = basename($image);
        $web_links[] = "/img/galery/" . $filename;
    }

    return $web_links;
}

// ############################################################################
// Blog functions
// ############################################################################

//-----------------------------------------------------------------------------
function get_blog_contents(): array{
    $news_array = read_json('/../../db/news.json');

    return $news_array;
    //$index_template_filename = "../src/template/blog.template.php";
    //$template_vars = ['news_array' => $news_array];

    //$blog_contents = render_template($index_template_filename, $template_vars);
    //$blog_filename = "../public/blog.html";
    //file_put_contents($blog_filename, $blog_contents);

}


function get_news():array{
    $news_to_array = fn ($json_file)=> read_json($json_file);
    $json_filenames = glob(__DIR__."/../../db/*.json");
    $news = array_map($news_to_array,$json_filenames);
    sort($news);
    return $news;
}

// ############################################################################
// Web Service functions
// ############################################################################

//-----------------------------------------------------------------------------
function get_web_service_data(): array {
    $webs_array = json_decode( file_get_contents('https://www.balldontlie.io/api/v1/teams'), true );

    return $webs_array;
    //$index_template_filename = "../src/template/service.template.php";
    //$template_vars = ['webs_array' => $webs_array];
    //echo file_get_contents('https://api.football-data.org/v4/matches');
    //$web_contents = Utils\render_template($index_template_filename, $template_vars);
    //$web_filename = "../public/web_service.html";
    //file_put_contents($web_filename, $web_contents);
}