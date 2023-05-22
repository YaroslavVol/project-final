const modal = document.getElementById('modal');
const closeBtn = document.querySelector('.close');

const openModal = document.querySelectorAll(".group")

const formAuth = document.getElementById('form-auth')

const output = document.querySelector(".profile");

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

    modalTitle.textContent = 'Group: ';
    modalYears.textContent = 'Year sets: ';
    modalPerson.textContent = 'Number person: ';
    modalElder.textContent = 'Name Elder: ';

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

// AUTH

formAuth.addEventListener('submit', auth);

async function auth(event){
    event.preventDefault();
    let data = new FormData(formAuth);

    const response = await fetch("api/auth.php", {
        method: 'POST',
        'Content-Type':'application/json',
        body: data
    });
    json = await response.json();
    console.log(json);
    if (json.status) {
      output.innerHTML = "Вы авторизованы как " + json.name;
      formAuth.style.display = "none";
    } else {
      let p = document.createElement("p");
      p.textContent = "Ошибка авторизации";
      output.prepend(p);
    }           
}

 // echo " <a href='profile.php'>Перейти в профиль</a>";
    // echo "
    // <form method='POST' action='api/exit.php'>
    //     <input type='submit' value='Выйти'>
    // </form>
    // ";