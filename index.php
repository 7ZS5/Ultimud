<?php

include 'dbConnect.php';

?>

<!DOCTYPE html>

<html lang="en">

<head>

<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Document</title>

<style>

* {

    padding: 0px;
    margin: 0px;
    box-sizing: border-box;
    color: rgb(0, 255, 0);

}

#main {

    padding: 10px;
    position: fixed;
    top: 0px;
    left: 0px;
    width: 100%;
    height: 100%;
    background-image: linear-gradient(grey, black);

}

#row1 {

    position: fixed;
    top: 20px;
    left: 650px;

}

#output {

    border: 1px solid black;
    width: 600px;
    height: 400px;
    overflow: auto;
    word-wrap: break-word;
    padding-left: 5px;
    padding-top: 5px;

}

#input {

    background-color: transparent;
    border: none;
    border: 1px solid black;
    width: 400px;
    outline: none;

}

.contColumn {

    display: flex;
    flex-direction: column;

}

.contRow {

    display: flex;
    flex-direction: row;

}

</style>

</head>

<body>

<div id="main">

<h1>Developer Environment</h1>

<div id="row1" class="contColumn">

    <label for="user" class="contRow">User:
        <p id="user">defaultPlayer</p>
    </label>

    <label for="currentRoom" class="contRow">Current room:
        <p id="currentRoom">defaultRoom</p>
    </label>
    
</div>

<div id="output"></div>

<form method="post" id="form_1">
<input id="input" type="text">
</form>

</div>

<script>

/* LEGEND

opt: option

cur: current

st: state

str: string

int: integer

ele: element

*/

// options, states, variables data map, element references

const eleOutput = document.getElementById('output'),

      eleInput = document.getElementById('input')

let dataMap = {

        //states

        stLogin: {type: 'opt', text: "Login or register.", options: ['optLogin', 'optRegister']},

        stLoginUsername: {type: 'strValid', text: "Enter your username.", func: 'validUsername', next: 'stLoginPassword'},

        stLoginPassword: {type: 'strValid', text: "Enter your password.", func: 'validPassword', next: 'stLogin'},

        stRegUsername: {type: 'strAssign', text: "What will your username be?", func: 'assignUsername', next: 'stRegPassword'},

        stRegPassword: {type: 'strAssign', text: "What will your password be?", func: 'assignPassword', next: 'stLogin'},

        //options

        optLogin: {text: "Login", next: 'stLoginUsername'},

        optRegister: {text: "Register", func: 'createUser',  next: 'stRegUsername'},

        //data

        user: ''

        }

let funcMap = {

    createUser: createUser,

    assignUsername: assignUsername,

    assignPassword: assignPassword,

    validUsername: validUsername,

    validPassword: validPassword
    
}


function printConnectStatus() {

        console.log("<?php echo $connectResult; ?>")
    
}


// prints current input state text and options if any

let stCur = dataMap['stLogin']

function printSt() { 

    eleOutput.innerHTML += `${stCur.text}<br>`

    if (stCur.type === 'opt') {

        let i = 1

        for (x in stCur.options) {

            eleOutput.innerHTML += `<br>${i}. ${dataMap[stCur.options[x]].text}`

            i++

        }

        eleOutput.innerHTML += "<br>"

}

    eleOutput.innerHTML += "<br>"

    eleOutput.scrollTop = eleOutput.scrollHeight

}

//creates a user with a username and password

function createUser() {

    const user = {

        username: "default",

        password: "default"

        }

    dataMap['user'] = Object.create(user)

}

function assignUsername() {

    dataMap['user'].username = userInput

}

function assignPassword() {

    dataMap['user'].password = userInput

    eleOutput.innerHTML += "New user created.<br><br>"

}

function validUsername() {

    if (dataMap['user'].username === userInput) {

        return true

    }

    return false

}

function validPassword() {

    if (dataMap['user'].password === userInput) {

        return true

    }

    return false

}

//clears input field on enter key/assigns input/converts input

let userInput

eleInput.addEventListener('keyup', (event) => {

    if (event.key === 'Enter') {

        userInput = eleInput.value

        eleInput.value = ""

        if (! isNaN(userInput)) {

            userInput = parseInt(userInput)

        }
        
        //checks if the current input state is an options, string, or int type
        //and then prints the text of that input state

        switch (stCur.type) {

            case 'opt':

                let optChoice = dataMap[stCur['options'][userInput-1]]

                if (isNaN(userInput)) {

                    break

                }

                if (optChoice.func) {

                    funcMap[optChoice.func]()

                }

                stCur = dataMap[optChoice.next]

                printSt()

                break

            case 'strAssign':

                if (isNaN(userInput)) {

                    funcMap[stCur.func]()

                    stCur = dataMap[stCur.next]

                    printSt()

                    break

                }

                break
            
            case 'strValid':

                if (isNaN(userInput)) {

                    if (funcMap[stCur.func]() === true) {

                        stCur = dataMap[stCur.next]

                        printSt()

                        break

                    }

                break

                }

            case 'int': 

        }

    }

})

printConnectStatus()
printSt()

</script>

</body>

</html>