// TREE
function treeUpdate(element, elementID, thisObj) {
    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": jQuery('meta[name="csrf-token"]').attr("content")
        }
    });
    $.ajax({
        url: "/tree-expand",
        type: "POST",
        cache: false,
        data: {
            model: element,
            modelID: elementID
        },
        datatype: "html",
        success: function(data) {
            thisObj.next("ul").html(data.html);
        },
        error: function(xhr, textStatus, thrownError) {
            alert(xhr + "\n" + textStatus + "\n" + thrownError);
        }
    });
}

function getContent(element, elementID) {
    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": jQuery('meta[name="csrf-token"]').attr("content")
        }
    });
    $.ajax({
        headers: { "X-CSRF-Token": $("meta[name=_token]").attr("content") },
        url: "/element-details",
        type: "POST",
        cache: false,
        data: {
            model: element,
            modelID: elementID
        },
        datatype: "html",
        beforeSend: function() {
            //something before send
            $("#contentBox").html(
                '<div class="d-flex justify-content-center"> <div class="spinner-border text-primary" role="status"> </div></div>'
            );
        },
        success: function(data) {
            $("#contentBox").html(data.html);
        },
        error: function(xhr, textStatus, thrownError) {
            alert(xhr + "\n" + textStatus + "\n" + thrownError);
        }
    });
}

$(document).on("click", ".treeElement", function() {
    let element = $(this).attr("element");
    let elementID = $(this).attr("elementID");

    getContent(element, elementID);
});

var toggler = document.getElementsByClassName("caret");
var i;

for (i = 0; i < toggler.length; i++) {
    toggler[i].addEventListener("click", function() {
        this.parentElement.querySelector(".nested").classList.toggle("active");
        this.classList.toggle("caret-down");
    });
}

$(document).on("click", "#openAll", function() {
    openTree();
});

function openTree() {
    $(".caret").each(function() {
        this.parentElement.querySelector(".nested").classList.add("active");
        this.classList.add("caret-down");
    });
}

$("#liveSearch").on("keyup", function() {
    openTree();
    if (this.value != "") {
        $("#tree li span").css("color", "black");
        $('#tree li span:contains("' + this.value + '")').css("color", "red");
    } else {
        $("#tree li span").css("color", "black");
    }
});

// TREE END

// Related Elements
$(".connectionElement").on("change", function() {
    let connection_element = $(this).attr("element");
    let connection_element_id = $(this).val();

    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": jQuery('meta[name="csrf-token"]').attr("content")
        }
    });
    $.ajax({
        headers: { "X-CSRF-Token": $("meta[name=_token]").attr("content") },
        url: "/connection-elements",
        type: "POST",
        cache: false,
        data: {
            connection_element: connection_element,
            connection_element_id: connection_element_id
        },
        datatype: "html",
        success: function(data) {
            console.log(data);
        },
        error: function(xhr, textStatus, thrownError) {
            alert(xhr + "\n" + textStatus + "\n" + thrownError);
        }
    });
});
