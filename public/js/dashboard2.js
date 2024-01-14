//_________________________getarticles_______________________________________________________________
function getArticle() {
    $.ajax({
        url: 'http://localhost/MokhlisBelhaj_Wiki/author/allarticle',
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
                row += '<td class="border border-1 text-center">' + item.title + '</td>';
                row += '<td class="border border-1 text-center" class="p-4 border-b border-blue-gray-50">'
                row += '<div class="flex items-center gap-3">'
                row += '  <img src="http://localhost/MokhlisBelhaj_Wiki/img/' + item.imageName + '" alt="Spotify" class="inline-block relative object-center !rounded-full w-12 h-12 rounded-lg border border-blue-gray-50 bg-blue-gray-50/50 object-contain p-1">'
                row += '</div>'
                row += '</td>'
                row += '<td class="border border-1 text-center">' + item.content + '</td>';
                row += '<td class="border border-1 text-center">' + item.category_name + '</td>';
                row += '<td class="border border-1 text-center">' + item.tag_names + '</td>';
                row += '<td class="border border-1 text-center">' + item.create_at + '</td>';
                row += '<td class="border border-1 text-center">' + item.edit_at + '</td>';
                row += '<td class="border border-1 text-center">' + item.status + '</td>';
                row += '<td class="border border-1 text-center">';
                row += '<div class="flex justify-evenly gap-1">';
                row += '<button class="Article-edite  text-blue-500 hover:text-blue-600"><input type="hidden" value="' + item.id + '" class="editeArticle"><i title="Edit" class="fa-solid fa-pencil p-1 text-green-500 rounded-full cursor-pointer"></i></button>';
                row += '</td>'
                row += '<td class="border border-1 text-center">';
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
//___________________________________modelAddArticles________________________________

const tagInput = document.getElementById('tagInput');
const tagDropdownContent = document.getElementById('tagDropdownContent');
const tagCheckboxes = document.querySelectorAll('input[name="selected_tags[]"]');
var downArrowTag = document.getElementById('downArrowtag');
var upArrowTag = document.getElementById('upArrowtag');


tagInput.addEventListener('input', function () {
    filterTagOptions();
    if (tagInput.value.trim() !== '') {
        showTagDropdown()
    }
});

tagCheckboxes.forEach(checkbox => {
    checkbox.addEventListener('change', updateTagSelection);
});

function filterTagOptions() {
    const tagSearchTerm = tagInput.value.toLowerCase();

    Array.from(tagDropdownContent.children).forEach(tagOption => {
        const tagOptionText = tagOption.textContent.toLowerCase();
        tagOption.style.display = tagOptionText.includes(tagSearchTerm) ? 'block' : 'none';
    });
}

function updateTagSelection() {
    const selectedTags = Array.from(tagCheckboxes)
        .filter(checkbox => checkbox.checked)
        .map(checkbox => checkbox.value);

    // Display the selected tags (customize based on your needs)
    console.log('Selected Tags:', selectedTags);
}

function toggleTagDropdown() {
    var tagDropdown = document.getElementById('tagDropdownContent');
    tagDropdown.classList.toggle('hidden');
    downArrowTag.toggleAttribute('hidden');
    upArrowTag.toggleAttribute('hidden');
}

function showTagDropdown() {
    var tagDropdown = document.getElementById('tagDropdownContent');
    tagDropdown.classList.remove('hidden');
    upArrowTag.removeAttribute('hidden');
    downArrowTag.setAttribute('hidden', 'true');
}
function openArticleModal() {
    $.ajax({
        url: 'http://localhost/MokhlisBelhaj_Wiki/author/allCategory',
        type: 'GET',
        dataType: 'json',
        success: function (data) {
            console.log(data);
            var select = $('#selectcategory');

            // Clear existing content
            select.empty();

            // Iterate through the data and append options to the select element
            $.each(data, function (index, item) {
                var option = '<option value="' + item.idCategory + '">' + item.name + '</option>';
                select.append(option);
            });
        },
        error: function (error) {
            // Handle any errors that occur during the request
            console.error('Error fetching data:', error);
        }
    });
    //    _____________________tags____________________


    // AJAX request
    $.ajax({
        url: 'http://localhost/MokhlisBelhaj_Wiki/author/alltags',
        type: 'GET',
        dataType: 'json',
        success: function (data) {
            console.log(data);
            var select = $('#tagDropdownContent');

            // Clear existing content
            select.empty();

            // Iterate through the data and append options to the select element
            $.each(data, function (index, item) {
                var option = ' <div  class="p-2"><label> <input type="checkbox" name="selected_tags[]" multiple value="' + item.idtag + '" class="mr-2"> ' + item.name + ' </label></div>';
                select.append(option);
            });
        },
        error: function (error) {
            // Handle any errors that occur during the request
            console.error('Error fetching data:', error);
        }
    });



    // ____________________________________________________________________________

    $("#ArticleModal").removeClass("hidden");
}

function closeArticleModal() {
    $("#ArticleModal").addClass("hidden");
}
$("#addNewWiki").on("click", openArticleModal);

//_______________________add new wiki________________

$('#articleForm').submit(function (event) {
    event.preventDefault(); // Prevent the default form submission

    var $this = $(this);
    var formData = new FormData($this[0]);

    $.ajax({
        url: $this.attr('action'),
        type: "POST",
        data: formData,
        cache: false,
        contentType: false,
        processData: false,
        success: function (response) {
            console.log(response);
            getArticle();
            closeArticleModal();

        },
        error: function (error) {
            // Handle errors 
            data = error.responseJSON;
            console.log(data);
            $("#image_err").text(data.image_err);
            if (data.image_err) {
                $("#large_size").addClass('border-red-500');
            } else {
                $("#large_size").removeClass('border-red-500');
            }
            $("#content_err").text(data.content_err);
            if (data.content_err) {
                $("#content").addClass('border-red-500');
            } else {
                $("#content").removeClass('border-red-500');
            }
            $("#title_err").text(data.title_err);
            if (data.title_err) {
                $("#title").addClass('border-red-500');
            } else {
                $("#title").removeClass('border-red-500');
            }
            $("#tag_err").text(data.tags_err);
            

        }
    });
});
// ___________________delete wiki________________
$(document).on('click', '.Article-delete-link', function (event) {
    event.preventDefault(); // Prevent the default behavior of the link
    console.log($('.inputDelete', $(this).parent()).val());
    var deleteUrl = "http://localhost/MokhlisBelhaj_Wiki/author/deleteArticle/" + $('.inputDelete', $(this).parent()).val();



    // Confirm with the user before sending the delete request
    if (confirm('Are you sure you want to delete this Wiki?')) {
        $.ajax({
            url: deleteUrl,
            method: 'DELETE', // Adjust the HTTP method based on your API requirements
            success: function () {
                $(event.target).closest('tr').remove();

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

