$(document).ready(function () {
    $('.delete_product').click(function (e) { 
        e.preventDefault();

        var id =$(this).val();
        // alert(id);


        swal({
            title: "Are you sure?",
            text: "Once deleted, you will not be able to recover ",
            icon: "warning",
            buttons: true,
            dangerMode: true,
          })
          .then((willDelete) => {
            if (willDelete) {
              $.ajax({
                method: "POST",
                url: "code.php",
                data: {
                    'product_id':id,
                    'delete_product':true
                },
                success: function (response) {
                  console.log(response);
                    if(response==200)
                    {
                        swal("Success!", "Product Deleted Successfully!", "success");
                        $("#product-table").load(location.href+" #product-table");
                    }
                    else if(response==500)
                    {
                        swal("Error!","Something Went Wrong","error");
                    }
                }
              });
            } 
          });
    });
});