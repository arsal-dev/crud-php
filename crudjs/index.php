<?php include './includes/header.php'; ?>

<div class="container mt-5">
<div class="alert alert-success alert-dismissible fade show d-none" id="alert" role="alert">
  <strong>Success!</strong> <span id="msg">User Deleted successfully</span>
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Password</th>
                <th scope="col">Created At</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody id="tbody"></tbody>
    </table>

    <!-- creating a form -->
    <div class="container">
        <form id="form">
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" id="name" class="form-control">
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" class="form-control">
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" class="form-control">
            </div>
            <button class="btn btn-primary mt-3">Submit</button>
        </form>
    </div>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Delete</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        Are You Sure You Want To DELETE?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal" id="dlt_modal">DELETE</button>
      </div>
    </div>
  </div>
</div>

<script>
    let tbody = document.getElementById('tbody');
    window.addEventListener('load', function(){
        showData();
    });


    async function showData(){
        tbody.innerHTML = '';
        let res = await fetch('./get_data.php');
        res = await res.text();
        res = JSON.parse(res).data;
        console.log(res);
        
        tbody.innerHTML = '';
        let num = 0;
        for(let i = 0; i < res.length; i++){
            num++;
            tbody.innerHTML += `<tr>
                <th scope="row">${num}</th>
                <td>${res[i].name}</td>
                <td>${res[i].email}</td>
                <td>${res[i].password}</td>
                <td>${res[i].created_at}</td>
                <td><button class="btn btn-warning">Edit</button>&nbsp;<button class="btn btn-danger dlt" data-bs-toggle="modal" data-bs-target="#exampleModal" data-id="${res[i].id}">Delete</button></td>
            </tr>`;
        }

        delteData();
    }

    function delteData(){
        let dlt = document.querySelectorAll('.dlt');
        let dlt_modal = document.getElementById('dlt_modal');
        let dlt_id;
        for(let i = 0; i < dlt.length; i++){
            dlt[i].addEventListener('click', function(){
                dlt_id = this.getAttribute('data-id');
                console.log(dlt_id);
            });
        }
    
        dlt_modal.addEventListener('click', async function(){
            let response = await fetch('./dlt_data.php', {
                method: 'POST',
                body: JSON.stringify({dlt_id})
            });
    
            response = await response.text();
            let res = JSON.parse(response);
    
            if(res.code == 200){
                document.getElementById('alert').classList.remove('d-none');
                showData();
            }
        });
    }

    let form = document.getElementById('form');
    form.addEventListener('submit', async function(e){
        e.preventDefault();
        let name = document.getElementById('name').value;
        let email = document.getElementById('email').value;
        let password = document.getElementById('password').value;

        let obj = { name, email, password };

        let response = await fetch('./add_data.php', {
            method: 'POST',
            body: JSON.stringify(obj)
        });

        response = await response.text();
        response = JSON.parse(response);
        console.log(response);

        if(response.code == 200){
            document.getElementById('alert').classList.remove('d-none');
            document.getElementById('msg').innerHTML = response.res;
            showData();
        }
    });

</script>
<?php include './includes/footer.php'; ?>