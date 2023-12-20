function ping() {
    var formData = new FormData();
    formData.append('address', document.getElementById('addresse').value);
    formData.append('count', document.getElementById('nb_ping').value);

    document.getElementById('result').innerHTML = "<div class='spinner-border' role='status'><span class='sr-only'></span></div>";

    fetch('actions/actionModule_ping.php', {
        method: 'POST',
        body: formData
    })
    .then(response => response.text())
    .then(html => {
        document.getElementById('result').innerHTML = html;
    });
}