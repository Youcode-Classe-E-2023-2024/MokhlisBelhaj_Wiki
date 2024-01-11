function collapseSidebar() {
    let sidebar = document.getElementById('sidebar')
    let content = document.getElementById('content')
    let toggle = document.getElementById('toggle-button')
    let titles = sidebar.querySelectorAll('span')

    if (sidebar.classList.contains('lg:w-[240px]')) {
        //sidebar
        sidebar.classList.remove('lg:w-[240px]')
        sidebar.classList.add('w-[60px]')

        //content
        content.classList.remove('lg:w-[100wh-250px]')
        content.classList.remove('lg:ml-[240px]')
        content.classList.add('lg:w-[100wh-100px]')
        content.classList.add('ml-[60px]')

        //toggle
        toggle.classList.remove('rotate-0')
        toggle.classList.add('rotate-180')
    } else {
        //sidebar
        sidebar.classList.remove('w-[60px]')
        sidebar.classList.add('lg:w-[240px]')

        //content
        content.classList.remove('lg:w-[100wh-100px]')
        content.classList.remove('ml-[60px]')
        content.classList.add('lg:w-[100wh-250px]')
        content.classList.add('lg:ml-[240px]')

        //toggle
        toggle.classList.remove('rotate-180')
        toggle.classList.add('rotate-0')
    }
}
// ------------------------------CategoryModal------------------------------

function openModal() {
    $("#CategoryModal").removeClass("hidden");
}

function closeModal() {
    $("#CategoryModal").addClass("hidden");
}

function createProject() {
    var formData = $(".project-form").serializeArray();
    console.log(formData['0'].value);

    if (formData['0'].value == "") {
        alert("Please fill the input.");
        return;
    }

    $.ajax({
        url: 'https://jsonplaceholder.typicode.com/posts',
        type: 'POST',
        contentType: 'application/json',
        data: JSON.stringify(formData),
        success: function(data) {
            alert('Category created successfully.');
            closeModal(); // Optionally close the modal after successful submission
        },
        error: function(jqXHR, textStatus, errorThrown) {
            alert('Error creating projects: ' + errorThrown);
        }
    });
}

$("#addNewCATEGORY").on("click", openModal);
// ------------------------------------------TagModal---------------
function opentagModal() {
    $("#TagModal").removeClass("hidden");
}

function closetagModal() {
    $("#TagModal").addClass("hidden");
}
function createtag() {
    var formData = $("#new-tag-form").serializeArray();
    console.log(formData);

    if (formData['0'].value == "") {
        alert("Please fill the input .");
        return;
    }

    $.ajax({
        url: 'https://jsonplaceholder.typicode.com/posts',
        type: 'POST',
        contentType: 'application/json',
        data: JSON.stringify(formData),
        success: function(data) {
            alert('Category created successfully.');
            closeModal(); // Optionally close the modal after successful submission
        },
        error: function(jqXHR, textStatus, errorThrown) {
            alert('Error creating projects: ' + errorThrown);
        }
    });
}
$("#addNewTag").on("click",opentagModal );