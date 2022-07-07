var usersArr = [
    { username: 'Jan Kowalski', birthYear: 1983, salary: 4200 },
    { username: 'Anna Nowak', birthYear: 1994, salary: 7500 },
    { username: 'Jakub Jakubowski', birthYear: 1985, salary: 18000 },
    { username: 'Piotr Kozak', birthYear: 2000, salary: 4999 },
    { username: 'Marek Sinica', birthYear: 1989, salary: 7200 },
    { username: 'Kamila Wiśniewska', birthYear: 1972, salary: 6800 },
];
function checkStatus(usersArr) {
    const CURRENTYEAR = new Date().getFullYear();
    usersArr.forEach(userObj => {

        if (userObj.salary < 5000) {
            console.log(`${userObj.username}, szykuj się na podwyżkę!`);

        } else if (userObj.salary > 15000) {
            console.log('Witaj, prezesie!');
        }

        let currentUserOld = (CURRENTYEAR - userObj.birthYear);

        if (currentUserOld % 2 == 0) {
            console.log(`Witaj, ${userObj.username}! W tym roku kończysz ${currentUserOld} lat!`);
        } else {
            console.log(`${userObj.username} jesteś zwolniony!`);
        }
    });
}

checkStatus(usersArr);