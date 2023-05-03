
var resList = []

window.onload = async (e) => {

    const id = location.search.replace("?id=", "")

    document.getElementsByName("rec_id")[0].value = id


    res = await fetch("http://localhost/REC_APP/Controllers/Reclamation/findOne.php?id=" + id, {
        method: "GET"
    }).then(v => v.json())


   
    document.getElementById("client_name").innerText = res.client
    document.getElementById("created_at").innerText = res.created_at
    document.getElementById("subject").innerText = res.subject
    document.getElementById("content").innerText = res.content


    res = await fetch("http://localhost/REC_APP/Controllers/Reponse/findByRec.php?id=" + id, {
        method: "GET"
    })
        .then(r => r.json())

        resList = res;
    ObjectToHtml(resList)

    document.getElementById("rpCount").innerText = res.length

}
ObjectToHtml = (res) => {
    val = res.map((v) => {
        return `
        <div class="card card-rp">
            <h4>${v.id}</h4>
            <h4>${v.admin}</h4>
            <h5>${v.created_at}</h5>
            <p>${v.content}</p>
            <div>
                <button onclick='open_update("${v.id}")' class='up'>UPDATE</button>
                <button onclick='delete_rec("${v.id}")' class='dl'>DELETE</button>
             </div>

        </div>
            `
    }).join('')
    document.getElementById("repList").innerHTML = val;
}
const AddWidgetToggle = () => {
    c = document.getElementById("AddNewRec")
    c.classList.toggle("shown")
}

const UpWidgetToggle = () => {
    c = document.getElementById("updateRec")
    c.classList.toggle("shown")
}

document.getElementById("AddForm").addEventListener("submit",
    async (event) => {
        event.preventDefault();
        const data = Object.fromEntries(new FormData(event.currentTarget))

        if (data.rec_id == "") {
            alert("REC_ID FIELD EMPTY")
            return;
        }
        else if (data.admin == "") {
            alert("ADMIN FIELD EMPTY")
            return;
        }
        else if (data.content == "") {
            alert("CONTENT FIELD EMPTY")
            return;
        }

        // validation
        const res = await fetch("http://localhost/REC_APP/Controllers/Reponse/insert.php", {
            method: "POST",
            body: JSON.stringify(data)
        })

        if (res.status != 200) {
            // error happened
            const val = await res.text();
            alert(val);
            return;
        }
        location.reload()
    }
);

const delete_rec = async (id) => {
    const url = `http://localhost/REC_APP/Controllers/Reponse/delete.php?id=${id}`
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

const open_update = async (id) => {
    const url = `http://localhost/REC_APP/Controllers/Reponse/findOne.php?id=${id}`
    const res = await fetch(url, {
        method: "GET",
    })
    if (res.status != 200) {
        const val = await res.text();
        alert(val);
        return;
    }
    UpWidgetToggle()
    const val = await res.json();
    document.getElementById("uprc_ID").value = (val.id);
    document.getElementById("rec_id").value = (val.rec_id);
    document.getElementById("uprc_admin").value = (val.admin);
    document.getElementById("uprc_content").value = (val.content);
}


document.getElementById("UpdateForm").addEventListener("submit",
    async (event) => {
        event.preventDefault();
        const data = Object.fromEntries(new FormData(event.currentTarget))

        if (data.id == "") {
            alert("ID FIELD EMPTY")
            return;
        }
        else if (data.rec_id == "") {
            alert("REC_ID FIELD EMPTY")
            return;
        }
        else if (data.admin == "") {
            alert("ADMIN FIELD EMPTY")
            return;
        }
        else if (data.content == "") {
            alert("CONTENT FIELD EMPTY")
            return;
        }
        // validation
        const res = await fetch("http://localhost/REC_APP/Controllers/Reponse/update.php", {
            method: "POST",
            body: JSON.stringify(data)
        })

        if (res.status != 200) {
            // error happened
            const val = await res.text();
            alert(val);
            return;
        }
        location.reload()
    }
);


document.getElementById("search").addEventListener("keyup", (f) => {
    var val = f.currentTarget.value
    nl = resList.filter((v) => v.admin.includes(val));
    ObjectToHtml(nl)
})

document.getElementById("filters").addEventListener("change", (f) => {
    var c = f.currentTarget.value
    if (c == "dc") {
        filter = (a, b) => Date.parse(a.created_at) - Date.parse(b.created_at);
    } else if (c == "dd") {
        filter = (a, b) => Date.parse(b.created_at) - Date.parse(a.created_at);
    } else if (c == "az") {
        filter = (a, b) => {
            if (a.admin < b.admin)
                return -1
            if (b.admin < a.admin) {
                return 1
            }
            return 0
        };
    } else if (c == "za") {
        filter = (a, b) => {
            if (a.admin > b.admin)
                return -1
            if (b.admin > a.admin) {
                return 1
            }
            return 0
        };
    }
    ObjectToHtml(resList.sort(filter))
})
