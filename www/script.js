var btn = document.getElementById('btn');
function malowanie(){
    var input = document.getElementById('myInput').value;
    console.log(input);
    puszki = input/4;

    document.getElementById('text').innerHTML = "Liczba jednolitrowych puszek farby potrzebnych do pomalowania wynosi: " + Math.celi(puszki);
}
Math.

btn.addEventListener("click", malowanie);