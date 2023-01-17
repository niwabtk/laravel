$(document).ready(() => {
  console.log("test");
  const $surat = $('#show-data');
  //$('#get-data').on('click', (event) => {
    //  jangan refresh halaman    
    //event.preventDefault(); 

    // $showData.text('Loading the JSON file.');

    // get json di endpoint
    $.getJSON('https://api.alquran.cloud/v1/surah', (respon) => {
      console.log(respon.code);
      console.log(respon.status);
      
      // mengatur ulang format respon dari json menjadi html
      const markup = respon.data
        .map(item => `<li class="surat" data-idsurat="${item.number}">
                Nama surat: ${item.number}: ${item.name}
            </li>`)
        .join('');

      const list = $('<ul />').html(markup);

      $('#show-data').html(list);

     
    $('.surat').on('click', function (event) {
        console.log();
        var x = $(event.target).data("idsurat");
        // var x = 10;
        alert (x);
        $.getJSON('https://api.alquran.cloud/v1/surah/' + x + '?offset=0&limit=10', (respon) => {
          alert (respon.data.ayahs[1].text);

          const ayat = respon.data.ayahs.map(item => `<p>${item.text}${item.number}</p>`).join('');

          $('#show-ayah').html(ayat);

        });

    });

  

   // });
  });
  
});
//$showData.text('Loading the JSON file.');

// get json di endpoint
// $.getJSON('https://api.alquran.cloud/v1/surah' + $(event.target).data("idsurat") + '?offset=0&limit=10', (respon) => {
//   console.log(respon.code);
//   console.log(respon.status);
  
//   // mengatur ulang format respon dari json menjadi html
//   const head = '<li>0: Default</li>'
//   const list = $('<ul />').html(head + markup);
// tampilkan di kolom ke dua