window.onload = async (e) => {
    const res = await fetch("http://localhost/REC_APP/Controllers/Blocked/findAll.php", {
        method: "GET"
    }).then(r => r.json())
    ObjectToHtml(res)
}

const ObjectToHtml = (arr) => {
    console.log(arr);
    tag = document.getElementById("blk_lst")
    val = arr.map(v => {
        return `
        
            <div class="blk_item">
                <div class="cl-info">
                <h3>${v.client}</h3>
                <button onclick="unblock(${v.id})">unblock</button>
            </div> 
            </div>
        `;
    }).join("");
    tag.innerHTML = val;
}

const unblock = async (id) => {
    const url = `http://localhost/REC_APP/Controllers/Blocked/delete.php?id=${id}`
    const res = await fetch(url, {
        method: "GET",
    })
    if (res.status != 200) {
        const val = await res.text();
        alert(val);
        return;
    }
    location.reload()
}
