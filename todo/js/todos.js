let submitTodo = document.getElementById('submit-todo');
let todos = document.getElementById('todos');

submitTodo.addEventListener('submit', function(e){
    e.preventDefault();
    let todo = document.getElementById('todo').value;
    document.getElementById('todo').value = '';
    insert_todo(todo);
});


async function insert_todo(todo){
    let response = await fetch('./api/insert_todo.php', {
        method: 'POST',
        body: JSON.stringify({todo})
    });

    response = await response.text();
    response = JSON.parse(response);
    console.log(response);
    showData();
}


window.addEventListener('load', function(){
    showData();
});

async function showData(){
    todos.innerHTML = '';
    let response = await fetch('./api/get_data.php');
    response = await response.text();
    response = JSON.parse(response).data;

    for(let i = 0; i < response.length; i++){
        todos.innerHTML += `
        <div>
            <li id="${response[i].id}">${response[i].todo}</li>
            <div>
                <button class="update_btn btn btn-primary d-none">Update</button>
                <button id="${response[i].id}" class="todo_dlt btn btn-danger">Delete</button>&nbsp;<button id="${response[i].id}" class="btn btn-warning edit">Edit</button>
            </div>
        </div>`;
    }
    edit_todo();
    todo_dlt();
}


function todo_dlt(){
    let todo_dlt = document.querySelectorAll('.todo_dlt');
    for(let i = 0; i < todo_dlt.length; i++){
        todo_dlt[i].addEventListener('click', function(){
            let id = this.getAttribute('id');
            remove_todo(id);
        });
    }
}

async function remove_todo(id){
    let response = await fetch('./api/remove_todo.php', {
        method: 'POST',
        body: JSON.stringify({id})
    });

    response = await response.text();
    response = JSON.parse(response);

    if(response.code == 200){
        showData();
    }
}


function edit_todo(){
    let edit_todo = document.querySelectorAll('.edit');
    for(let i = 0; i < edit_todo.length; i++){
        edit_todo[i].addEventListener('click', function(){
            let id = this.getAttribute('id');
            let edit_value = this.parentElement.previousSibling.previousSibling;

            edit_value.setAttribute('contenteditable', 'true');
            edit_value.focus();

            update_btn = this.previousSibling.previousSibling.previousSibling.previousSibling;

            let newClassName = 'clsFrUp';

            update_btn.classList.remove('d-none');
            update_btn.classList.add('clsFrUp');
            update_todo(newClassName, edit_value);
        });
    }
}

function update_todo(newClassName, edit_value){
    let update_btn = document.querySelector(`.${newClassName}`);
    update_btn.addEventListener('click', function(){
        let newVal = edit_value.innerHTML;
        let id = edit_value.getAttribute('id');

        update_push(newVal, id, update_btn, edit_value, newClassName);
    });
}


async function update_push(newVal, id, update_btn, edit_value, newClassName){
    let obj = { newVal, id };
    let response = await fetch('./api/update_todo.php',{
        method: 'POST',
        body: JSON.stringify(obj)
    });

    response = await response.text();
    response = JSON.parse(response);

    if(response.code == 200){
        update_btn.classList.add('d-none');
        update_btn.classList.remove(newClassName);
        edit_value.setAttribute('contenteditable', 'false');
    }
}