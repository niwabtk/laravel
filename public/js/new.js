$(document).ready(() => {
 
    const $showData = $('#show-data');
    const $showAyah = $('#show-ayah');
   
    const $raw = $('pre');
      // get json di endpoint
      $.getJSON('https://api.alquran.cloud/v1/surah', (respon) => {
        console.log(respon.code);
        console.log(respon.status);
       
        // mengatur ulang format respon dari json menjadi html
        const markup = respon.data
          .map(item => `<tr>
                  <td>&nbsp;</td> 
                  <td width="43" class="surat" data-nomer="${item.number}" scope="row" id="no">${item.number}</td> 
                  <td width="150" class="surat" data-nomer="${item.number}" scope="row" id="surat">${item.englishName}</td>
                  <td width="160"   class="surat" data-nomer="${item.number}" scope="row" id="surat">${item.name}</td>
                  <td  width="245" class="surat" data-nomer="${item.number}" scope="row" id="surat">${item.revelationType}</td>
                  
              </tr>`)
          .join('');
        const list = $('<table border="1" class="table" />').html(markup);
        
        // tampilkan di kolom ke dua
        $showData.html(list);
       
        $('.surat').on('click', function (event) {
          var id = $(event.target).data("nomer");
          $.getJSON(`https://api.alquran.cloud/v1/surah/${id}?offset=0&limit=`, function (respon2) {
              console.log(respon2);
              const markup = respon2.data.ayahs
                .map(item => ` <tr style="background-color:#dad3b6;"><td style="white-space: normal;" scope="row">⊙ ${item.text}</td></tr> `)
                .join('');
       
              const list = $('<table class="table"/>').html(markup);
       
              // tampilkan di kolom ke dua
              $showAyah.html(list);
          });
        });
  
      });
     
   
  });