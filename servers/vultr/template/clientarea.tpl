<div id="vultr-config-form">
    <h3>选择配置</h3>
    
    <label for="region">Region：</label>
    <select id="region"></select><br><br>

    <label for="plan">Plan：</label>
    <select id="plan"></select><br><br>

    <label for="app">Application：</label>
    <select id="app"></select><br><br>

    <button id="confirmSelection">确认配置</button>
</div>

<script>
document.addEventListener("DOMContentLoaded", function() {
    fetch('ajax.php?action=loadOptions')
        .then(response => response.json())
        .then(data => {
            data.regions.forEach(function(region) {
                document.getElementById("region").innerHTML += `<option value="${region.id}">${region.name}</option>`;
            });
            data.plans.forEach(function(plan) {
                document.getElementById("plan").innerHTML += `<option value="${plan.id}">${plan.name}</option>`;
            });
            data.apps.forEach(function(app) {
                document.getElementById("app").innerHTML += `<option value="${app.id}">${app.name}</option>`;
            });
        });
});
</script>
