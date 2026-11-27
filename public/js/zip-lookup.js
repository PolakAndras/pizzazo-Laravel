document.addEventListener('DOMContentLoaded', () => {
    const dataZip = document.querySelector("input[name=zip]");
    const dataCity = document.querySelector("input[name=city]");

    // Csak akkor fut le, ha mindkét mező megtalálható az adott oldalon
    if (dataZip && dataCity) {
        dataZip.addEventListener('change', (e) => {
            if (e.target.value.length === 4) {
                fetch(`https://hur.webmania.cc/zips/${dataZip.value}.json`)
                    .then(response => {
                        if (!response.ok) throw new Error('Hiba az API hívásnál');
                        return response.json();
                    })
                    .then(zipData => {
                        if (zipData.zips && zipData.zips.length > 0) {
                            dataCity.value = zipData.zips[0].name;
                        }
                    })
                    .catch(error => {
                        console.error('Hiba történt:', error.message);
                    });
            }
        });
    }
});











































//Működik



// document.addEventListener('DOMContentLoaded', () => {
//     const dataZip = document.querySelector("input[name=zip]");
//     const dataCity = document.querySelector("input[name=city]");

//     // Csak akkor fut le, ha mindkét mező megtalálható az adott oldalon
//     if (dataZip && dataCity) {
//         dataZip.addEventListener('change', (e) => {
//             if (e.target.value.length === 4) {
//                 fetch(`https://hur.webmania.cc/zips/${dataZip.value}.json`)
//                     .then(response => {
//                         if (!response.ok) throw new Error('Hiba az API hívásnál');
//                         return response.json();
//                     })
//                     .then(zipData => {
//                         if (zipData.zips && zipData.zips.length > 0) {
//                             dataCity.value = zipData.zips[0].name;
//                         }
//                     })
//                     .catch(error => {
//                         console.error('Hiba történt:', error.message);
//                     });
//             }
//         });
//     }
// });