<?php
include 'header.php';
?>

<!-- ======= Hero Section ======= -->
<section id="hero" class="hero d-flex align-items-center">
    <div class="container">

        <div class="row justify-content-between gy-5">

            <div class="col-md-6 order-2 order-lg-1 d-flex flex-column  justify-content-around align-items-center align-items-lg-start text-center text-lg-start">
                <div class="row d-flex flex-row col-md-12 justify-content-around">
                    <div class="form-group col-md-3" data-aos="fade-up" data-aos-delay="200">
                        <label for="exampleFormControlSelect1">Country</label>
                        <select class="form-control" id="country">
                            <option>Select country</option>
                            <option>USA</option>
                            <option>Nigeria</option>
                            <option>Custom</option>


                        </select>
                    </div>
                    <!-- Nigeria start -->
                    <div id="Nigeria" class="form-group col-md-4">
                        <label for="exampleFormControlSelect1">Category</label>
                        <select id="nigeriaOptions" class="form-control">


                        </select>
                    </div>
                    <div id="NigeriaFood" data-aos="fade-up" data-aos-delay="200" class="form-group col-md-3">
                        <label for="exampleFormControlSelect1">Food</label>
                        <select id="nigeriaFood" class="form-control">


                        </select>
                    </div>
                    <!-- Nigeria ends -->
                    <!-- USA Starts -->
                    <div id="Usa" data-aos="fade-up" data-aos-delay="200" class="form-group col-md-4">
                        <label for="exampleFormControlSelect1">Resturants</label>
                        <select id="usaOptions" class="form-control">


                        </select>
                    </div>
                    <!-- Usa Ends -->
                    <!-- Custom Starts -->
                    <div id="Custom" class="form-group col-md-4">
                        <label for="exampleFormControlSelect1">Category</label>
                        <select id="customOptions" class="form-control">


                        </select>
                    </div>
                    <!-- <div id="UsaFood" class="form-group col-md-3">
                            <label for="exampleFormControlSelect1">Food</label>
                            <select id="usaFood" class="form-control">


                            </select>
                        </div> -->
                    <!-- USA Ends -->

                </div>
                <div data-aos="fade-up" data-aos-delay="200" id="lists" class="lists col-md-10 d-flex flex-row flex-wrap justify-content-around align-items-center">

                </div>
            </div>

            <div class="col-md-6 order-1 order-lg-2 text-center text-lg-start">
                <div class="cart">
                    <h1>Food items</h1>
                    <div class="row">
                        <div class="medium-6 columns">
                        </div>
                        <div class="medium-6 columns">
                            <button id="clear" class="tiny btn btn-info" title="Work in progress">Clear</button>
                        </div>
                    </div>
                    <div id="cartItems">Loading list...</div>
                    Total Kcal: <strong id="totalkcal"></strong>
                </div>

                <div class="lists col-md-12 d-flex flex-wrap justify-content-around align-items-center">
                    <div id="foodItem" class="lists col-md-12 d-flex flex-wrap justify-content-around align-items-center">

                    </div>

                    <div class="col-md-12 d-flex justify-content-around align-items-center">

                        <?php if (!empty($_SESSION['id'])) { ?>
                            <!-- <div class="col-md-12">
                                <label>Additional notes</label>
                                <textarea name="notes" id="notes"></textarea>
                               
                            </div> -->

                            <div id="alert" class="row col-md-12 d-flex justify-content-around align-items-center">
                                <label>Additional notes</label>
                                <div class="col-md-12 p-2">

                                    <textarea class="form-control" name="notes" id="notes"></textarea>

                                </div>
                                <button id="save" onclick="saveFood()" class="btn btn-danger">Save</button>
                            </div>

                        <?php } ?>
                    </div>
                </div>

            </div>
            <div class="col-md-10 order-1 order-lg-2 text-center text-lg-start">

            </div>

        </div>
    </div>
</section><!-- End Hero Section -->

<main id="main">


</main><!-- End #main -->

<!-- ======= Footer ======= -->

<!-- End Footer -->
<!-- End Footer -->

<a href="#" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>





<script type="text/template" id="cartT">
    <% _.each(items, function (item) { %> <div class = "panel"> <h3> <%= item.name %> </h3>  <span class="label">
<%= item.count %> piece<% if(item.count > 1)
{%>s
<%}%> for <%= item.total %>$</span > </div>
<% }); %>
</script>
<script type="text/javascript">
    var fooditems = JSON.parse(window.localStorage.getItem("items"));
    var user = JSON.parse(window.localStorage.getItem("user"));

    const tkcal = () => {

        var total = 0;
        for (let i = 0; i < fooditems.length; i++) {
            total += parseFloat(fooditems[i]["calories"]);
        }
        if (total) {
            $("#totalkcal").html(total);
        }
    };

    const addToList = () => {
        console.log('fooditems', fooditems)
        fooditems = JSON.parse(window.localStorage.getItem("items"));
        var items = "";
        for (let k = 0; k < fooditems.length; k++) {
            items += `<div class="item col-md-12"  data-aos="fade-in" data-aos-delay="200">
                            <div class="buttons">
                                <span onclick='removeItem("${fooditems[k]["food"]}")' class="delete-btn"></span>
                                <span class="like-btn"></span>
                            </div>



                            <div data-name=${fooditems[k]["food"]} data-price=${
                    fooditems[k]["calories"]
                    } data-id=${fooditems[k]["food"]}class="description" class="mt-3 col-md-4">
                                
                                                            <span>${fooditems[k]["food"]
                                                            .replace("_", " ")
                                                            .toUpperCase()}</span>
                                                            </div>

                                            <div class="quantity  col-md-3">
                                                <button id="plus-btn" class="plus-btn  btn btn-info" type="button" onclick='plus(${k},${
                    fooditems[k]["calories"]
                    })' name="button">
                                                    <img src="assets/img/plus.svg" alt="">
                                                </button>
                                                <input type="text" class="count" name="name" value="${fooditems[k]["quantity"]}">
                                                <button id="minus-btn" class="minus-btn btn btn-info" type="button" onclick='minus(${k},${
                    fooditems[k]["calories"]
                    })' name="button">
                                                    <img src="assets/img/minus.svg" alt="">
                                                </button>
                                            </div>

                            <div class="total-price  col-md-1">${
                              fooditems[k]["calories"]
                            }</div>
                           

                        </div> `;
        }
        $("#foodItem").html("");
        $("#foodItem").html(items);
        tkcal();
    };

    const plus = (a, b) => {
        console.log('a,b', a, b, fooditems)
        fooditems[a]["quantity"] += 1
        fooditems[a]["calories"] =
            parseFloat(fooditems[a]["calories"]) + parseFloat(fooditems[a]["cc"]);
        window.localStorage.setItem("items", JSON.stringify(fooditems));
        addToList();
    };
    const minus = (a, b) => {
        if (fooditems[a]["quantity"] > 0) {
            fooditems[a]["quantity"] -= 1
        }

        fooditems[a]["calories"] =
            parseFloat(fooditems[a]["calories"]) - parseFloat(fooditems[a]["cc"]);
        window.localStorage.setItem("items", JSON.stringify(fooditems));
        addToList();
    };
    const removeItem = (a) => {
        var newList = fooditems.filter(item => {

            return item.food != a
        })
        window.localStorage.setItem("items", JSON.stringify(newList));


        addToList();
    }


    const selectFood = (data) => {
        // console.log('data', data, "here")

        // $(`#${data?.food}`).hide(); 

        let items = JSON.parse(window.localStorage.getItem("items"));
        // console.log('items.includes(data)', items.includes(data))
        let check = items.some((vendor) => vendor["food"] === data.food);
        if (!check) {
            items.push(data);
        }
        window.localStorage.setItem("items", JSON.stringify(items));
        addToList();
        tkcal();
    };
    const saveFood = () => {
        const notes = $('#notes').val()

        $.ajax({
            type: "POST",
            url: "./actions/save.php",
            data: {
                data: fooditems,
                user: user.id,
                notes
            },
            success: () => {
                $("#alert").html("<div class='alert alert-success' role='alert'>Saved</div>")
                setTimeout(() => {
                    window.localStorage.removeItem("items");
                    window.location.reload();
                }, 2000);

            },
            error: () => {
                alert("error")
            },
            dataType: "json"
        });
    }
</script>
<?php
include "body.php";
?>