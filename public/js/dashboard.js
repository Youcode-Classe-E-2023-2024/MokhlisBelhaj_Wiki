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

function createCategory() {
    var formData = $(".Category-form").serialize();
    if (formData['0'].value == "") {
        alert("Please fill the input.");
        return;
    }
    $.ajax({
        url: 'http://localhost/MokhlisBelhaj_Wiki/admin/addCategory',
        type: 'POST',
        data: formData,
        success: function (data) {
            console.log(data);
            alert('Category created successfully.');
            closeModal(); // Optionally close the modal after successful submission
        },
        error: function (jqXHR, textStatus, errorThrown) {
            alert('Error creating projects: ' + errorThrown);
        }
    });
}

$("#addNewCATEGORY").on("click", openModal);

// _____________________________getCategory________________________
function getCategory(){
    $.ajax({
        url: 'http://localhost/MokhlisBelhaj_Wiki/admin/allCategory',
        type: 'GET',
        dataType: 'json', // Change this based on the expected response type
        success: function (data) {
            var tbody = $('#Categorytable');


            // Clear existing content
            tbody.empty();

            // Iterate through the data and append rows to the tbody
            $.each(data, function (index, item) {
                var row = '<tr>';
                row += '<td>' + item.name + '</td>';
                row += '<td>' + item.create_at + '</td>';
                row += '<td>' + item.edit_at + '</td>';
                row += '<td>';
                row += '<div class="flex justify-evenly gap-1">';
                row += '<button class="Category-edite text-blue-500 hover:text-blue-600"><input type="hidden" value="' + item.idCategory + '" class="editeCategory"><i title="Edit" class="fa-solid fa-pencil p-1 text-green-500 rounded-full cursor-pointer"></i></button>';
                row += ' <button class="category-delete-link text-red-500 hover:text-red-600"><input type="hidden" value="' + item.idCategory + '" class="inputDelete"><i title="Delete" class="fa-solid fa-trash p-1 text-red-500 rounded-full cursor-pointer"></i></button>';
                row += '</div>';
                row += '</td>';
                row += '</tr>';
                tbody.append(row);
            });
        },
        error: function (error) {
            // Handle any errors that occur during the request
            console.error('Error fetching data:', error);
        }
    });
}
$(document).ready(function () {
    getCategory();
  
});
// __________________________________________editCategory__________________________________
$(document).on("click", ".Category-edite", openCategoryEditModal);

function openCategoryEditModal() {
    // Open the modal

    var editid = $('.editeCategory', $(this).parent()).val()
    console.log(editid);
    $.ajax({
        url: 'http://localhost/MokhlisBelhaj_Wiki/admin/getCategoriesId/' + editid,
        method: 'get',
        dataType: 'json',
        success: function (data) {
            console.log(data);
            $('#nameupdateCategory').val(data[0].name);
            $('#editeCategoryrid').val(data[0].idCategory);
        },
        error: function (error) {
            console.log('Error fetching data: ', error);
        }
    })
    $('#editCategoryModal').removeClass('hidden');
}
function closeCategoryEditeModal() {
    $('#editCategoryModal').addClass('hidden');

}
function editeCategory() {
    console.log('hna',$('#editeTagrCategory').val());

    $.ajax({
        url: `http://localhost/MokhlisBelhaj_Wiki/admin/updateCategory`,
        method: 'post',
        dataType: 'json',
        data: {
            "name": $('#nameupdateCategory').val(),
            "idCategory": $('#editeCategoryrid').val()
        },

        success: function (data) {
            alert(' updated Category successfully');
            getCategory();
            $('#editCategoryModal').addClass('hidden');
        },
        error: function (error) {
            alert(' Category not updated ');
        }
    })

}
// __________________________________________categorydelete________________________________________
$(document).on('click', '.category-delete-link', function (event) {
    event.preventDefault(); // Prevent the default behavior of the link

    var deleteUrl = "http://localhost/MokhlisBelhaj_Wiki/admin/deleteCategory/" + $('.inputDelete', $(this).parent()).val();
    console.log(deleteUrl);

    // Confirm with the user before sending the delete request
    if (confirm('Are you sure you want to delete this category?')) {
        $.ajax({
            url: deleteUrl,
            method: 'DELETE', // Adjust the HTTP method based on your API requirements
            success: function () {
                $(event.target).closest('tr').remove();

                // Show a success alert
                alert('category deleted successfully!');
                getCategory();
                getArticle()
            },
            error: function (error) {
                console.log('Error deleting post: ', error);
            }
        });
    }
});

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
        alert("Please fill the input hna .");
        return;
    }


    $.ajax({
        url: 'http://localhost/MokhlisBelhaj_Wiki/admin/addtags',
        type: 'POST',
        data: formData,
        success: function (data) {
            console.log(data);
            alert('tag created successfully.');
            getTag();
            closetagModal(); // Optionally close the modal after successful submission
        },
        error: function (jqXHR, textStatus, errorThrown) {
            alert('Error creating projects: ' + errorThrown);
        }
    });
}

function getTag() {
    $.ajax({
        url: 'http://localhost/MokhlisBelhaj_Wiki/admin/alltags/',
        type: 'GET',
        dataType: 'json', // Change this based on the expected response type
        success: function (data) {
            console.log(data);

            // Handle the successful response here
            var tbody = $('#tagtable');

            tbody.empty();

            $.each(data, function (index, item) {

                var row = '<tr>';
                row += '<td>' + item.name + '</td>';
                row += '<td>' + item.create_at + '</td>';
                row += '<td>' + item.edit_at + '</td>';
                row += '<td>';
                row += '<div class="flex justify-evenly  gap-1">';
                row += '<button class="tag-edite text-blue-500 hover:text-blue-600"><input type="hidden" value="' + item.idtag + '" class="editetag"><i title="Edit" class="fa-solid fa-pencil p-1 text-green-500 rounded-full cursor-pointer"></i></button>';
                row += '<button class="tag-delete-link text-red-500 hover:text-red-600"><input type="hidden" value="' + item.idtag + '" class="inputDelete"><i title="Delete" class="fa-solid fa-trash p-1 text-red-500 rounded-full cursor-pointer"></i></button>';
                row += '</div>';
                row += '</td>';
                row += '</tr>';
                tbody.append(row);
            });
        },
        error: function (error) {
            // Handle any errors that occur during the request
            console.error('Error fetching data:', error);
        }
    });
}
$("#addNewTag").on("click", opentagModal);
// _____________________________getTags________________________
$(document).ready(function () {
    getTag();
   
});
// __________________________________________editTag__________________________________
$(document).on("click", ".tag-edite", openTagEditModal);

function openTagEditModal() {
    // Open the modal

    var editid = $('.editetag', $(this).parent()).val()
    $.ajax({
        url: 'http://localhost/MokhlisBelhaj_Wiki/admin/getTagId/' + editid,
        method: 'get',
        dataType: 'json',
        success: function (data) {
            console.log(data);
            $('#nameupdatetag').val(data[0].name);
            $('#editeTagrid').val(data[0].idtag);
        },
        error: function (error) {
            console.log('Error fetching data: ', error);
        }
    })
    $('#editTagModal').removeClass('hidden');
}
function closeTagEditeModal() {
    $('#editTagModal').addClass('hidden');

}
function editeTag() {

    $.ajax({
        url: `http://localhost/MokhlisBelhaj_Wiki/admin/updateTag`,
        method: 'post',
        dataType: 'json',
        data: {
            "name": $('#nameupdatetag').val(),
            "idtag": $('#editeTagrid').val()
        },

        success: function (data) {
            alert(' updated tag successfully');
            getTag();
            $('#editTagModal').addClass('hidden');
        },
        error: function (error) {
            alert(' njgiojiogu errorere tag');
            console.error(error);
        }
    })

}

// __________________________________________tagdelete________________________________________
$(document).on('click', '.tag-delete-link', function (event) {
    event.preventDefault(); // Prevent the default behavior of the link

    var deleteUrl = "http://localhost/MokhlisBelhaj_Wiki/admin/deletetag/" + $('.inputDelete', $(this).parent()).val();
    console.log(deleteUrl);

    // Confirm with the user before sending the delete request
    if (confirm('Are you sure you want to delete this tag?')) {
        $.ajax({
            url: deleteUrl,
            method: 'DELETE', // Adjust the HTTP method based on your API requirements
            success: function () {
                getTag();
                // Show a success alert
                alert('tag deleted successfully!');
            },
            error: function (error) {
                console.log('Error deleting post: ', error);
            }
        });
    }
});
//_______________________________________getarticles___________________________________

function getArticle(){
    $.ajax({
        url: 'http://localhost/MokhlisBelhaj_Wiki/admin/allarticle',
        type: 'GET',
        dataType: 'json', // Change this based on the expected response type
        success: function (data) {
            var tbody = $('#Articletable');
            console.log(data);


            // Clear existing content
            tbody.empty();

            // Iterate through the data and append rows to the tbody
            $.each(data, function (index, item) {
                var row = '<tr>';
                row += '<td>' + item.title + '</td>';
                row+='<td class="p-4 border-b border-blue-gray-50">'
                row+='<div class="flex items-center gap-3">'
                row+='  <img src="http://localhost/MokhlisBelhaj_Wiki/img/'+item.imageName+'" alt="Spotify" class="inline-block relative object-center !rounded-full w-12 h-12 rounded-lg border border-blue-gray-50 bg-blue-gray-50/50 object-contain p-1">'
                row+='</div>'
              row+='</td>'
                row += '<td>' + item.content + '</td>';
                row += '<td>' + item.id_user + '</td>';
                row += '<td>' + item.id_category + '</td>';
                row += '<td>' + item.id_category + '</td>';
                row += '<td>' + item.create_at + '</td>';
                row += '<td>' + item.edit_at + '</td>';
                row += '<td>' + item.status + '</td>';
                row += '<td>';
                row += '<div class="flex justify-evenly gap-1">';
                row += '<button class="Article-edite text-blue-500 hover:text-blue-600"><input type="hidden" value="' + item.id + '" class="editeArticle"><i title="Edit" class="fa-solid fa-pencil p-1 text-green-500 rounded-full cursor-pointer"></i></button>';
                row += ' <button class="Article-delete-link text-red-500 hover:text-red-600"><input type="hidden" value="' + item.id + '" class="inputDelete"><i title="Delete" class="fa-solid fa-trash p-1 text-red-500 rounded-full cursor-pointer"></i></button>';
                row += '</div>';
                row += '</td>';
                row += '</tr>';
                tbody.append(row);
            });
        },
        error: function (error) {
            // Handle any errors that occur during the request
            console.error('Error fetching data:', error);
        }
    });
}
$(document).ready(function () {
    getArticle();
   
});
$(document).on('click', '.Article-delete-link', function (event) {
    event.preventDefault(); // Prevent the default behavior of the link
console.log( $('.inputDelete', $(this).parent()).val());
    var deleteUrl = "http://localhost/MokhlisBelhaj_Wiki/admin/archiveArticle/" + $('.inputDelete', $(this).parent()).val();

   

    // Confirm with the user before sending the delete request
    if (confirm('Are you sure you want to delete this Wiki?')) {
        $.ajax({
            url: deleteUrl,
            method: 'put', // Adjust the HTTP method based on your API requirements
            success: function (response) {
console.log(response); //
                // Show a success alert
                getArticle();
                alert('Wiki deleted successfully!');
            },
            error: function (error) {
                console.log('Error deleting post: ', error);
            }
        });
    }
});

