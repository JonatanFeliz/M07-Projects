<?php
declare(strict_types=1);
namespace Model;

require_once(__DIR__ . '/../config.php');
use function Config\get_lib_dir;
use function Config\get_db_dir;

require_once(get_lib_dir() . '/table/table.php');
use Table\Table;

require_once(get_lib_dir() . '/utils/utils.php');
use function Utils\join_paths;

use \DateTimeImmutable as DTI;



// ############################################################################
// Table functions
// ############################################################################

// Example: '/manga' => '/app/db/manga.csv'
// ----------------------------------------------------------------------------
function get_csv_path(string $csv_id): string {

    $csv_suffix        = '.csv';
    $csv_relative_path = $csv_id . $csv_suffix;
    $csv_full_path     = join_paths(get_db_dir(), $csv_relative_path);

    return $csv_full_path;
}

// ----------------------------------------------------------------------------
function read_table(string $csv_filename): Table {

    $data = Table::readCSV($csv_filename);
    return $data;
}

// ----------------------------------------------------------------------------
function add_blog_message(string $csv_filename, string $message): void {

    // 1. Read Table
    $blog_data = Table::readCSV($csv_filename);

    // 2. Get current time
    $timestamp     = new DTI('now');
    $timestamp_str = $timestamp->format(DTI::RFC3339);

    // 3. Append new row
    $blog_data->prependRow([$timestamp_str , $message]);

    // 4. Write Table
    $blog_data->writeCSV($csv_filename);
}

// ----------------------------------------------------------------------------
function get_images(string $folder): array {
    $path = __DIR__ . "/../../../public/img/$folder/*";

    $path_image_array = glob($path);

    $web_links = array();

    foreach ($path_image_array as $image) {
        $filename = basename($image);
        $web_links[] = "/img/$folder/" . $filename;
    }

    return $web_links;
}

// ----------------------------------------------------------------------------
function add_new_user(string $csv_filename, string $user, string $password, string $role){
    // 1. Read Table
    $user_data = Table::readCSV($csv_filename);

    // 3. Append new row
    $user_data->prependRow([$user , $password, $role]);

    // 4. Write Table
    $user_data->writeCSV($csv_filename);
}

// ----------------------------------------------------------------------------
function add_new_team(string $csv_filename, string $position, string $team, string $points, string $delete): void{

    // 1. Read Table
    $blog_data = Table::readCSV($csv_filename);

    // 2.Get last position and last points
    $data      = $blog_data->body;

    $data_size = count($data) -1;

    $position_csv  = $data[$data_size]["Posicio"];
    $points_csv    = $data[$data_size]["Punts"];

    if ($position < $position_csv) {
        $position = $position_csv+1;
    }

    if ($points > $points_csv) {
        $points = $points_csv-1;
    }

    // 3. If delete is yes, delete de last row
    if($delete == "si"){
        array_pop($blog_data->body);
    }

    // 4. Append new row
    $blog_data->prependRow([$position , $team, $points]);

    // 5. Write Table
    $blog_data->writeCSV($csv_filename);
}

// ----------------------------------------------------------------------------
function delete_team(string $csv_filename): void{

    // 1. Read Table
    $blog_data = Table::readCSV($csv_filename);

    // 2. Delete last row
    array_pop($blog_data->body);

    // 3. Write Table
    $blog_data->writeCSV($csv_filename);
}