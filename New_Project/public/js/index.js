$(document).ready(function(){

    // Data

    // Change body color

    $(".oscur").click(()=>{
        $("body").css("background", "black");
        $("#title").css("color", "white");
    })

    $(".groc").click(()=>{
        $("body").css("background", "yellow");
        $("#title").css("color", "brown");
    })

    $(".blau").click(()=>{
        $("body").css("background", "grey");
        $("#title").css("color", "yellow");
    })

    $(".blanc").click(()=>{
        $("body").css("background", "none");
        $("#title").css("color", "black");
    })


    // Change table color
    $("#red_table").click(()=>{
        $("table").removeClass("table-success");
        $("table").removeClass("table-warning");
        $("table").removeClass("table-info");

        $("table").addClass("table-danger");
    })

    $("#blue_table").click(()=>{
        $("table").removeClass("table-success");
        $("table").removeClass("table-warning");
        $("table").removeClass("table-danger");

        $("table").addClass("table-info");
    })

    $("#green_table").click(()=>{
        $("table").removeClass("table-info");
        $("table").removeClass("table-warning");
        $("table").removeClass("table-danger");

        $("table").addClass("table-success");
    })

    $("#yellow_table").click(()=>{
        $("table").removeClass("table-success");
        $("table").removeClass("table-info");
        $("table").removeClass("table-danger");

        $("table").addClass("table-warning");
    })

    // Blog
    $("#red_blog").click(()=>{
        $(".bg-title").css("background", "red");
    })

    $("#blue_blog").click(()=>{
        $(".bg-title").css("background", "blue");
    })

    $("#green_blog").click(()=>{
        $(".bg-title").css("background", "green");
    })

    $("#yellow_blog").click(()=>{
        $(".bg-title").css("background", "yellow");
    })
})
