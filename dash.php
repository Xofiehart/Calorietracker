<?php
include 'header.php';

?>

<section id="hero" class="hero d-flex align-items-center">
    <div class="container">
        <div class="row justify-content-between gy-5">

            <div class="col-md-12 order-2 order-lg-1 d-flex flex-column  justify-content-around align-items-center align-items-lg-start text-center text-lg-start">
                <div class="row d-flex flex-row col-md-12 justify-content-around">
                    <div class="form-group col-md-3">
                        <span style="display:block;border-radius: 100px; height:300px;width:300px">
                            <svg xmlns="http://www.w3.org/2000/svg" width="100" height="100" fill="currentColor" class="bi bi-person-fill" viewBox="0 0 16 16">
                                <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3Zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6Z" />
                            </svg>
                            <h2><?= $_SESSION['fullname'] ?></h2>
                        </span>

                    </div>
                    <div class="form-group col-md-9 d-flex flex-column justify-content-around align-items-center"><!-- Button trigger modal -->
                        <div class="col-md-12">
                            <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#food">
                                Add New Food Item
                            </button>
                            <!-- Button trigger modal -->
                            <!-- <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#weight">
                                Add Current Weight
                            </button> -->
                        </div>

                        <div class="savedfood col-md-12">

                        </div>




                    </div>
                </div>
            </div>
        </div>
        <!-- Modal Add food -->
        <div class="modal modal-lg fade" id="food" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="staticBackdropLabel">Add New Food</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div>
                            <div class="col-md-10 ">
                                <label for="staticEmail2" class="">Food Name</label>
                                <input type="text" class="form-control" id="name" placeholder="food name">
                            </div>
                            <div class="col-md-10">
                                <label for="inputPassword2" class="">Calories</label>
                                <input type="number" class="form-control" id="calories" placeholder="calories">
                            </div>
                            <div class="col-md-10 py-2">
                                <label for="inputPassword2" class="">Category</label>
                                <select id="category" class="form-select" aria-label="Default select example">
                                    <option selected>select category</option>
                                    <option value="breakfast">Breakfast</option>
                                    <option value="lunch">Lunch</option>
                                    <option value="dinner">Dinner</option>
                                    <option value="snack">Snack</option>
                                </select>
                            </div>
                            <!-- <div class="col-md-10">
                                <label for="inputPassword2" class="">Carbs</label>
                                <input type="number" class="form-control" id="carbs" placeholder="carbs">
                            </div>
                            <div class="col-md-10">
                                <label for="inputPassword2" class="">Proteins</label>
                                <input type="number" class="form-control" id="proteins" placeholder="proteins">
                            </div>
                            <div class="col-md-10">
                                <label for="inputPassword2" class="">Fat</label>
                                <input type="number" class="form-control" id="fat" placeholder="fat">
                            </div> -->
                            <div class="col-md-10">
                                <button onclick="addFood()" type="submit" class="btn btn-primary mb-3">Add</button>
                            </div>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <!-- <button type="button" class="btn btn-primary">Understood</button> -->
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal Add weight-->
        <div class="modal fade" id="weight" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="staticBackdropLabel">Modal title</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        ...
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Understood</button>
                    </div>
                </div>
            </div>
        </div>

</section>
<script>
    const myModal = document.getElementById('food')
    const myInput = document.getElementById('myInput')

    myModal.addEventListener('shown.bs.modal', () => {
        // myInput.focus()
    })
    const deleteItem = (id) => {
        $.ajax({
            type: "POST",
            url: "./actions/deleteFavourite.php",
            data: {
                id
            },
            success: (response) => {
                console.log('id', id)
                alert("Item deleted");
                window.location.reload()
            },
            error: () => {
                alert("unable to delete item");
            },
        });

    };
</script>

<?php
include "body.php";
