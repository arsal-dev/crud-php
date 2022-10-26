let submitTodo = document.getElementById('submit-todo');
let todos = document.getElementById('todos');

submitTodo.addEventListener('submit', function(e){
    e.preventDefault();
    let todo = document.getElementById('todo').value;
    todos.innerHTML += `<li>${todo}</li>`;
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
}


window.addEventListener('load', function(){
    showData();
});

async function showData(){
    let response = await fetch('./api/get_data.php');
    response = await response.text();
    response = JSON.parse(response).data;

    for(let i = 0; i < response.length; i++){
        todos.innerHTML += `<li>${response[i].todo}</li>`;
    }
}