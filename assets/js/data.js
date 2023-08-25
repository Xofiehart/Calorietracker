import naija from "../json/naija.json" assert { type: "json" };
import usa from "../json/foods.json" assert { type: "json" };

var nigeria = [];
// Format NIgerian Food from JSON file to preferred grouped format
var nigeriaCopy = naija;
for (let i = 0; i < nigeriaCopy.length; i++) {
  const key = Object.keys(nigeriaCopy[i]);
  const cat = nigeriaCopy[i][key];
  cat["food"] = key[0];
  cat["cc"] = nigeriaCopy[i][key]["calories"];
  nigeria.push(cat);
}
// Refromat food entry to use category as keys 
var resultNigeria = nigeria.reduce(function (r, a) {
  r[a.category] = r[a.category] || [];
  r[a.category].push(a);
  return r;
}, Object.create(null));
// console.log("result", resultNigeria, nigeria);

// an onchanged listener for the country dropdown on the calorie tracker page
$("#country").on("change", () => {
  var country = $("#country").val();
  //nigeria
  if (country == "Nigeria") {
    $("#Nigeria").show();
    var catOptions = "<option>Select category</option>";
  //var key is set to an array of strings from the json data these string items represent each item in the json array
    const key = Object.keys(resultNigeria);
    for (let j = 0; j < key.length; j++) {
      catOptions += `<option value=${key[j]}>${key[j].replace(
        "_",
        " "
      )}</option> `;
    }
    $("#nigeriaOptions").html(catOptions);
    $("#USA").hide();
    $("#Custom").hide();
  } else {
    $("#Nigeria").hide();
  }
  // usa
  if (country == "USA") {
    $("#Usa").show();
    var catOptions = "<option>Select category</option>";

    for (let j = 0; j < usa.length; j++) {
      catOptions += `<option value=${usa[j].restaurant}>${usa[
        j
      ].restaurant.replace("_", " ")}</option> `;
    }
    $("#usaOptions").html(catOptions);
    $("#Nigeria").hide();
    $("#Custom").hide();
  } else {
    $("#USA").hide();
  }
  if (country == "Custom") {
    $("#Custom").show();
    var catOptions = `<select id="category" class="form-select" aria-label="Default select example">
                                    <option selected>select category</option>
                                    <option value="breakfast">Breakfast</option>
                                    <option value="lunch">Lunch</option>
                                    <option value="dinner">Dinner</option>
                                    <option value="snack">Snack</option>
                                </select>`;

    $("#customOptions").html(catOptions);
    $("#Nigeria").hide();
    $("#USA").hide();
  } else {
    $("#USA").hide();
  }
});

// an onchanged listener for the Nigeria dropdown on the calorie tracker page
$("#nigeriaOptions").on("change", () => {
  let nigeriaOptions = $("#nigeriaOptions").val();
  if (nigeriaOptions != "") {
    // $("#NigeriaFood").show();
    var foodOptions = "<option>Select Food</option>";
    let items = "";
    for (let k = 0; k < resultNigeria[nigeriaOptions].length; k++) {
      foodOptions += `<option value=${
                          resultNigeria[nigeriaOptions][k].food
                        }>${resultNigeria[nigeriaOptions][k].food.replace("_", " ")}</option> `;

// Items is set to a string containing HTML data formatted, to be injected into the browser or div of list
     items += `<div class="item col-md-6 id=${
                          resultNigeria[nigeriaOptions][k]["food"]
                        }">

                                              <div data-name=${
                                                resultNigeria[nigeriaOptions][k]["food"]
                                              } data-price=${
                          resultNigeria[nigeriaOptions][k]["calories"]
                        } data-id=${
                          resultNigeria[nigeriaOptions][k]["food"]
                        }class="description mt-3 col-md-8">
                        <img src=${
                          resultNigeria[nigeriaOptions][k].img_url
                        } width="60" height="50 alt="Apple" />
                               <span>${resultNigeria[nigeriaOptions][k]["food"]
                                 .replace("_", " ")
                                 .toUpperCase()}</span>
                            </div>
                             <div class="total-price  col-md-3"><button onclick='selectFood(${JSON.stringify(
                               {
                                 ...resultNigeria[nigeriaOptions][k][
                                   "nutritional_information"
                                 ],
                                 food: resultNigeria[nigeriaOptions][k]["food"],
                                 cc: resultNigeria[nigeriaOptions][k][
                                   "nutritional_information"
                                 ]["calories"],
                                 quantity: 1,
                               }
                             )})' class="tiny btn btn-info" id=${
        resultNigeria[nigeriaOptions][k]["food"]
      } >Select</button></div>
                           
                        </div> `;
    }
    $("#nigeriaFood").html(foodOptions);

    $("#lists").html(items);
    $("#minus-btn").on("click", (e) => {
      console.log("value", e);
      e.preventDefault();
      var $this = $(this);
      var $input = $this.closest("div").find("input");
      var value = parseInt($input.val());
      if (value > 1) {
        value = value - 1;
      } else {
        value = 0;
      }

      $input.val(value);
    });

    $("#plus-btn").on("click", (e) => {
      console.log("value", e);
      e.preventDefault();
      var $this = $(this);
      var $input = $this.closest("div").find("input");
      var value = parseInt($input.val());

      if (value < 100) {
        value = value + 1;
      } else {
        value = 100;
      }

      $input.val(value);
    });
  } else {
    $("#NigeriaFood").hide();
  }
});
// an onchanged listener for the USA dropdown on the calorie tracker page
$("#usaOptions").on("change", () => {
  let usaOptions = $("#usaOptions").val();
  if (usaOptions != "") {
    let items = "";
    let res = usa.filter((item) => item.restaurant == usaOptions);
    console.log("res", res);
    for (let k = 0; k < res[0]["foodItems"].length; k++) {
      res[0]["foodItems"][k]["cc"] = res[0]["foodItems"][k]["calories"];

      items += `<div class="item col-md-6 id=${
        res[0]["foodItems"][k]["foodName"]
      }"  data-aos="fade-up" data-aos-delay="200">

                            <div data-name=${
                              res[0]["foodItems"][k]["foodName"]
                            } data-price=${
        res[0]["foodItems"][k]["calories"]
      } data-id=${
        res[0]["foodItems"][k]["foodName"]
      }class="description" class="mt-3 col-md-8">
  
                               <span>${res[0]["foodItems"][k]["foodName"]
                                 .replace("_", " ")
                                 .toUpperCase()}</span>
                            </div>
                             <div class="total-price  col-md-3"><button onclick='selectFood(${JSON.stringify(
                               {
                                 ...res[0]["foodItems"][k],
                                 food: res[0]["foodItems"][k]["foodName"],
                                 cc: res[0]["foodItems"][k]["cc"],
                                 quantity: 1,
                               }
                             )})' class="tiny btn btn-info" id=${
        res[0]["foodItems"][k]["foodName"]
      } >Select</button></div>
                           
                        </div> `;
    }

    $("#lists").html(items);
  } else {
    $("#NigeriaFood").hide();
  }
});

// an onchanged listener for the custom dropdown on the calorie tracker page
$("#customOptions").on("change", async () => {
  let opt = $("#customOptions").val();
  if (opt != "") {
    let items = "";
    let form = new FormData();
    form.append("category", opt);
    let req = await fetch("actions/getCustom.php", {
      method: "POST",
      body: form,
    });
    let res = await req.json();

    console.log("res", res);
    for (let k = 0; k < res["data"].length; k++) {
      // res["data"][k]["cc"] = res["data"][k][0];

      items += `<div class="item col-md-6 id=${
        res["data"][k][1]
      }"  data-aos="fade-up" data-aos-delay="200">

                            <div data-name=${res["data"][k][1]} data-price=${
        res["data"][k][0]
      } data-id=${res["data"][k][1]}class="description" class="mt-3 col-md-8">
  
                               <span>${res["data"][k][1]
                                 .replace("_", " ")
                                 .toUpperCase()}</span>
                            </div>
                             <div class="total-price  col-md-3"><button onclick='selectFood(${JSON.stringify(
                               {
                                 //  ...res["data"][k],
                                 food: res["data"][k][1],
                                 calories: res["data"][k][2],
                                 cc: res["data"][k][2],
                                 quantity: 1,
                               }
                             )})' class="tiny btn btn-info" id=${
        res["data"][k][1]
      } >Select</button></div>
                           
                        </div> `;
    }

    $("#lists").html(items);
  } else {
    $("#NigeriaFood").hide();
  }
});
$("#nigeriaFood").on("change", () => {
  let nfood = $("#nigeriaFood").val();
  let nop = $("#nigeriaOptions").val();

  if (nfood != "") {
  }
});

$("document").ready(() => {
  $("#Nigeria").hide();
  $("#NigeriaFood").hide();
  $("#Usa").hide();
  $("#Custom").hide();
  const items = window.localStorage.getItem("items");
  if (!items) {
    window.localStorage.removeItem("items");
    window.localStorage.setItem("items", JSON.stringify([]));
  }
  $("#clear").on("click", () => {
    window.localStorage.removeItem("items");
    window.location.reload();
  });
  $(".like-btn").on("click", function () {
    $(this).toggleClass("is-active");
  });
  const getData = () => {
    $.ajax({
      type: "GET",
      url: "./actions/userFoods.php",

      success: (response) => {
        console.log("response", response);
        const saved = response["data"];
        //   .reduce(function (r, a) {
        //   // console.log("r,a", r, a);
        //   r[a[0][2]] = r[a] || [];
        //   r[a[0][2]].push(a);
        //   return r;
        // }, Object.create(null));
        const addToSaved = () => {
          var Allitems = [];

          for (let i = 0; i < saved.length; i++) {
            var items = "";
            var total = 0;
            var note = "";
            var date = "";
            items += `<div class="d-flex justify-content-around align-items-center col-md-9 selected"  data-aos="fade-up" data-aos-delay="200">`;
            for (let k = 0; k < saved[i].length; k++) {
              note = saved[i][k][3] ? saved[i][k][3] : "";
              date = saved[i][k][4] ? saved[i][k][4] : "";
              total += parseFloat(saved[i][k][1]);
              items += `<div class="item col-md-12 ">
                          <div data-name=${saved[i][k][0]} data-price=${
                saved[i][k][1]
              } data-id=${
                saved[i][k][0]
              }class="description" class="mt-3 col-md-4">
               <span>${saved[i][k][0]
                 .replace("_", " ")
                 .toUpperCase()}</span></div>
                <div class="total-price  col-md-1">${saved[i][k][1]}</div>
                
                        </div>
                        `;
            }
            items += `<div>${note}</div>`;
            items += `<div> Meal Day: ${new Date(date).toDateString()}</div>`
            items += `<div>Total Calories: ${total} KCL</div><div class="buttons"><span onclick='deleteItem("${saved[i][0][2]}")' class="delete-btn"></span></div></div>`;
            Allitems.push(items);
          }
          // console.log("Allitems", Allitems);
          var divitems = "";
          for (let i = 0; i < Allitems.length; i++) {
            divitems += Allitems[i];
          }
          $(".savedfood").html("");
          $(".savedfood").html(divitems);
        };
        addToSaved();
      },
      error: () => {
        // alert("error");
      },
      dataType: "json",
    });
  };
  getData();
  const user = JSON.parse(window.localStorage.getItem("user"));
  // console.log("user", user);
  if (user) {
    const navdata = `              <li><a href="#hero">Home</a></li>
                    <li><a href="#about">About</a></li>
                    <li><a href="#menu">Menu</a></li>


                    <li><a href="#contact">Contact</a></li>
                 <li><a href="dash.php">profile</a></li>
                        <li><a onclick="logout()"  href="actions/logout.php">Logout</a></li>
                  
                        `;
    $(".navhead").html(navdata);
  } else {
    const navdata = `              <li><a href="#hero">Home</a></li>
                    <li><a href="#about">About</a></li>
                    <li><a href="#menu">Menu</a></li>


                    <li><a href="#contact">Contact</a></li>
                 <li onclick="logout()"><a href="login.php">Login</a></li>`;
    $(".navhead").html(navdata);
  }
});

// addToList();
