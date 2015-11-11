function dump(obj) {
    var out = '';
    for (var i in obj) {
        out += i + ": " + obj[i] + "\n";
    }

    var pre = document.createElement('pre');
    pre.innerHTML = out;
    return pre;
}

function person (name, age, color) {
    this.name = name;
    this.age = age;
    this.color = color;
}
