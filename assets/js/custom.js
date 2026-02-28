$(document).ready(function(){
 
    loadBusinesses();

    function loadBusinesses(){
    $.get("ajax/fetch_business.php", function(response){

        var businesses = JSON.parse(response);

        console.log("Database Response:");
        console.log(businesses);

        var html = "";

        businesses.forEach(function(row){

            html += `
            <tr>
                <td>${row.id}</td>
                <td>${row.name}</td>
                <td>${row.address}</td>
                <td>${row.phone}</td>
                <td>${row.email}</td>
                <td>
                    <button class="btn btn-sm btn-warning editBtn" data-id="${row.id}">Edit</button>
                    <button class="btn btn-sm btn-danger deleteBtn" data-id="${row.id}">Delete</button>
                </td>
                <td>
                    <div class="raty-read" 
                        data-score="${row.avg_rating}" 
                        data-id="${row.id}">
                    </div>
                </td>
            </tr>`;
        });

        $("#businessTable").html(html);

        // Re-initialize raty after DOM update
        $(".raty-read").each(function(){
            $(this).raty({
                readOnly: true,
                half: true,
                starOn: 'https://cdnjs.cloudflare.com/ajax/libs/raty/3.1.1/images/star-on.png',
                starOff: 'https://cdnjs.cloudflare.com/ajax/libs/raty/3.1.1/images/star-off.png',
                starHalf: 'https://cdnjs.cloudflare.com/ajax/libs/raty/3.1.1/images/star-half.png',
                score: $(this).data("score")
            });
        });
         $('.raty-read').click(function(){
                $('#business_id').val($(this).data('id'));
                $("#ratingForm")[0].reset();
                $('#ratingModal').modal('show');
            });

    });
}

 

    // Save Business
    $("#businessForm").submit(function(e){
        e.preventDefault();
        $.post("ajax/save_business.php", $(this).serialize(), function(){
            $('#businessModal').modal('hide');
            loadBusinesses();
        });
    });



    // Edit Business
 $(document).on("click", ".editBtn", function(){

    var id = $(this).data("id");

    $.getJSON("ajax/get_business.php", {id: id}, function(business){

        var modal = $("#businessModal");
        var form  = modal.find("#businessForm");

        form.find("#business_id_hidden").val(business.id);
        form.find("input[name='name']").val(business.name);
        form.find("input[name='address']").val(business.address);
        form.find("input[name='phone']").val(business.phone);
        form.find("input[name='email']").val(business.email);

        modal.modal("show");
    });

});

    // Delete
let deleteId = null;
let deleteRow = null;

$(document).on("click", ".deleteBtn", function(){

    deleteId = $(this).data("id");
    deleteRow = $(this).closest("tr");

    $("#deleteConfirmModal").modal("show");

});


$("#confirmDeleteBtn").on("click", function(){

    if(!deleteId) return;

    $.post("ajax/delete_business.php", {id: deleteId})
    .done(function(){

        // Remove row dynamically (no reload)
        deleteRow.fadeOut(300, function(){
            $(this).remove();
        });

        $("#deleteConfirmModal").modal("hide");

    })
    .fail(function(){
        alert("Delete failed");
    });

});

    // Rating Save
    $("#ratingForm").submit(function(e){
        e.preventDefault();
        $.post("ajax/save_rating.php", $(this).serialize(), function(avg){
            $('#ratingModal').modal('hide');
            loadBusinesses();
        });
    });



    // Open Add Business Modal
$("#addBusinessBtn").click(function(){
    $("#businessForm")[0].reset();
    $("#business_id_hidden").val('');
    $("#businessModal").modal('show');
});


// Initialize Rating Modal Raty
$('#ratyInput').raty({
    half: true,
    starOn: 'https://cdnjs.cloudflare.com/ajax/libs/raty/3.1.1/images/star-on.png',
    starOff: 'https://cdnjs.cloudflare.com/ajax/libs/raty/3.1.1/images/star-off.png',
    starHalf: 'https://cdnjs.cloudflare.com/ajax/libs/raty/3.1.1/images/star-half.png',
    click: function(score){
        $('#ratingValue').val(score);
    }
});


});