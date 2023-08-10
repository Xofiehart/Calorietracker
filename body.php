<div id="preloader"></div>

<!-- Template Main JS File -->
<script src="assets/js/main.js"></script>
</script>
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
            items += `<div class="item col-md-12">
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

    const addFood = () => {

        const food = $("#name").val()
        const calories = $("#calories").val()
        const category = $("#category").val()
        $.ajax({
            type: "POST",
            url: "./actions/addFood.php",
            data: {
                name: food,
                calories: calories,
                category,
                userid: user.id
            },
            success: () => {
                // $("#alert").html("<div class='alert alert-success' role='alert'>Saved</div>")
                alert("Custom food item added")
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
    const logout = () => {
        window.localStorage.removeItem("user")
    }
    // if (items != "") {
    //     addToList();
    // }
</script>
</body>


</html>