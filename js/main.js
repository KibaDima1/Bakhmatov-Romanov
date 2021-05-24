
function regValidation() {
    let login = $("input[name='login']")[0].value,
        pass = $("input[name='pass']")[0].value,
        fname = $("input[name='fname']")[0].value,
        sname = $("input[name='sname']")[0].value,
        tname = $("input[name='tname']")[0].value;
    if(login == "") {
        alert('Пустой логин');
        return false;
    }
    if(pass == "") {
        alert('Пустой пароль');
        return false;
    }
    if(fname == "") {
        alert('Пустое имя');
        return false;
    }
    if(sname == "") {
        alert('Пустая фамилия');
        return false;
    }
    if(tname == "") {
        alert('Пустое отчество');
        return false;
    }
    return true;
}

function signInValidation() {
    let login = $("input[name='login']")[0].value,
        pass = $("input[name='pass']")[0].value;
    if(login == "") {
        alert('Пустой логин');
        return false;
    }
    if(pass == "") {
        alert('Пустой пароль');
        return false;
    }
    return true;
}

$(document).ready(function() {
    $("#regBtn").on("click", (e) => {
        if(!regValidation())
            e.preventDefault();
    });
    $("#signInBtn").on("click", (e) => {
        console.log(1);
        if(!signInValidation())
            e.preventDefault();
    });
});