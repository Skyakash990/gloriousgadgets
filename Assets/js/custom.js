$(document).ready(function () {
    $('.plus').click(function (e) { 
        e.preventDefault();
        
        let qty=$(this).closest('.product_data').find('.qty').val();
        var value =parseInt(qty,10);
        value = isNaN(value)? 0:value;
        if(value<10)
        {
            value++;
            
            $(this).closest('.product_data').find('.qty').val(value);
        }
    });
    $('.minus').click(function (e) { 
        e.preventDefault();
        
        let qty=$(this).closest('.product_data').find('.qty').val();
        var value =parseInt(qty,10);
        value = isNaN(value)? 0:value;
        if(value>1)
        {
            value--;
            
            $(this).closest('.product_data').find('.qty').val(value);
        }
    });
    $('.addTocartBtn').click(function (e) { 
        e.preventDefault();
        let qty=$(this).closest('.product_data').find('.qty').val();
        var prod_id=$(this).val();
        
        $.ajax({
            type: "POST",
            url: "functions/handlecart.php",
            data: 
                {
                "prod_id":prod_id,
                "prod_qty":qty,
                "scope":"add"
            },
            success: function (response) {
                if(response==201)
                {
                    alertify.notify('Product Added To cart');
                }
                else if(response=="Existing")
                {
                    alertify.notify('Product Already in cart');
                }
                else if(response==401)
                {
                    alertify.notify('Login To Continue');
                }
                else if(response==500)
                {
                    alertify.notify('Something Went Wrong');
                }
            }
        });
    });

   $(document).on('click','.updateQty', function () {
    
    let qty=$(this).closest('.product_data').find('.qty').val();   
    let prod_id=$(this).closest('.product_data').find('.prodId').val();

        $.ajax({
            method:"POST",
            url: "functions/handlecart.php",
            data: 
            {
            "prod_id":prod_id,
            "prod_qty":qty,
            "scope":"update" 
        },
            success: function (response) {
              
            }
        });
   });

   $(document).on('click','.deleteItem', function () {
    var cart_id = $(this).val();
    // alert(cart_id);
    $.ajax({
        method:"POST",
        url: "functions/handlecart.php",
        data: 
        {
        "cart_id":cart_id,
        "scope":"delete" 
    },
        success: function (response) {
            if(response==200)
            {
                alertify.notify('Item Removed');
                $("#remove").load(location.href+" #remove");
             }
            else
            {
                alertify.notify("Item Removed");

            }
        }
    });
    

    
   });
});


// const plus =document.querySelector(".plus"),
//  minus =document.querySelector(".minus"),
//  qty =document.querySelector(".input-qty");

//     let a = 1;
//     plus.addEventListener("click",()=>{
//         a++;
//         a=(a < 10) ? "0" + a : a;
//         qty.innerText = a;
//         console.log(a);

//         minus.addEventListener("click",()=>{
//             if(a > 1)
//             {
//                 a--;
//                 a=(a < 10) ? "0" + a : a;
//                 qty.innerText = a;
//             }
    
//         });

//     });
