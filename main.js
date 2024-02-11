

function done(evn){

    var k = evn.target.closest('.todo');
    
    if(k){
        k.remove();
    }
    data = {
        "task" : k.textContent
    }

    fetch("main.php",

    {
        "method" : "POST",
        "headers": {
            "Content-Type": "application/json; charset=utf-8"
        },
        "body" : JSON.stringify(data)
    })
    
}




document.getElementById("mainform").addEventListener('submit',function(event){

    event.preventDefault();
    var newTask = document.getElementById("tsk").value;
    var xhr = new XMLHttpRequest();

    xhr.open('POST','add.php',true);
    
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    xhr.onload = function() {
        if (xhr.status === 200) {
        var response = JSON.parse(xhr.responseText);
        if (response.success) {
                console.log("Oise");
        } else {
            console.log('Error adding task: ' + response.message);
        }
        } else {
        console.log('Error adding task: ' + xhr.statusText);
        }
    };

    xhr.send('newTask=' + encodeURIComponent(newTask));

})








