const modal = document.getElementById('modal');
const closeBtn = document.querySelector('.close');

const openModal = document.querySelectorAll(".group")



async function getModal(event) {
    event.preventDefault()

    let id = event.target.dataset.id

    modal.style.display = 'block';
    const modalTitle = document.querySelector('.modal-content h2');

    const modalYears = document.querySelector('.year_sets');
    const modalPerson = document.querySelector('.number_persons');
    const modalElder = document.querySelector('.name_elder');

    const response = await fetch("api/data.php?id=" + id, {
        method: 'GET',
        'Content-Type': 'application/json',
        // body: data
    });
    
    json = await response.json();

    console.log(json);

    modalTitle.textContent = 'Group: ' + json.group_name;
    modalYears.textContent = 'Year sets: ' + json.year_sets;
    modalPerson.textContent = 'Number person: ' + json.number_persons;
    modalElder.textContent = 'Name Elder: ' + json.name_elder;

    closeBtn.addEventListener('click', () => {
        modal.style.display = 'none';
    });
      
    window.addEventListener('click', event => {
        if (event.target == modal) {
            modal.style.display = 'none';
        }
    });
}

openModal.forEach((group) => {
    group.addEventListener('click', getModal)
})

// openModal.addEventListener('click', getModal)


// "group_name" => $row["group_name"],
// "year_sets" => $row["year_sets"],
// "number_persons" => $row["number_person"],
// "name_elder" => $row["name_elder"],




// async function data(event) {
//     event.preventDefault()


//     const response = await fetch("api/data.php", {
//         method: 'POST',
//         'Content-Type': 'application/json',
//         body: data
//     });
    
//     json = await response.json();

//     console.log(json);
// }