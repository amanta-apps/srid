function formatRupiah(angka, prefix){
  var number_string = angka.replace(/[^,\d]/g, '').toString(),
  split   		= number_string.split(','),
  sisa     		= split[0].length % 3,
  rupiah     	= split[0].substr(0, sisa),
  ribuan     	= split[0].substr(sisa).match(/\d{3}/gi);

  // tambahkan titik jika yang di input sudah menjadi angka ribuan
  if(ribuan){
    separator = sisa ? '.' : '';
    rupiah += separator + ribuan.join('.');
  }

  rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
  return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
}
// -------------->> Login & Logout
function login() {
   var userid = $('#useriddatalogin').val()
   var pass = $('#passwordiddatalogin').val()

   $.ajax({ 
    url: "function/getdata.php",
    dataType: "JSON",
    type: "POST",
    cache: false,
    data: {
      "proseslogin": [userid,pass]
    },
    success: function (data) {
      if (data.return == 1) {
        const Toast = Swal.mixin({
          toast: true,
          position: data.position,
          showConfirmButton: false,
          timer: 1500,
          timerProgressBar: true,
        })
        Toast.fire({
          icon: data.icon,
          title: data.pesan
        }).then(() => {
          location.href = "page/mainpage?p="+ data.link +"";
        });
      } else {
        const Toast = Swal.mixin({
          toast: true,
          position: data.position,
          showConfirmButton: false,
          timer: 1500,
          timerProgressBar: true,
        })
        Toast.fire({
          icon: data.icon,
          title: data.pesan
        })
      }
    },
  });
}
function logoutsystem() {
  const Toast = Swal.mixin({
    toast: true,
    position: 'top-end',
    showConfirmButton: true,
    showCancelButton: true,
    confirmButtonText: 'Ya',
    cancelButtonText: 'Tidak',
    timer: null,
  });
  
  Toast.fire({
    icon: 'question',
    title: 'Tekan "YA" untuk keluar dari sistem?'
  }).then((result) => {
    if (result.isConfirmed) {
      $.ajax({ 
        url: "../function/getdata.php",
        dataType: "JSON",
        type: "POST",
        cache: false,
        data: {
          "proseslogoutsystem": true
        },
        success: function (data) {
          if (data.return == 1) {
            Swal.fire({
            icon: 'success',
            text: 'Semoga berjumpa kembali.',
            showConfirmButton: false,
            focusConfirm: false,
            showCloseButton: true,
            footer: '<a href>We miss you</a>',
            // timer: 1500
          })
            setTimeout(function () {
              window.location.replace(data.link)  
            }, 1500);
          }
        },
      });
    }
  });
  
}
function msgs(iconmsgsukses='success',msgsukses='Tersimpan', time=3000) {
  Swal.fire({
    icon: iconmsgsukses,
    text: msgsukses,
    showConfirmButton: false,
    focusConfirm: false,
    showCloseButton: false,
  })
  return
}
function download(linked) {
  var fileUrl = linked;
  var link = document.createElement('a');
  link.href = fileUrl;
  link.download = link; 
  document.body.appendChild(link);
  link.click();
  document.body.removeChild(link);
}
// --------------- >>
function redirectlink(link,values,title,cc =  null) {
  $.ajax({ 
    url: "../function/getdata.php",
    dataType: "JSON",
    type: "POST",
    cache: false,
    data: {
      "prosesredirectlink": [link,values,title,cc]
    },
    success: function (data) {
      if (data.link != "") {
        location.href = "mainpage?p="+data.link+"";
      }
    },
  });
}
function redirectlink_pres(e) {
  if (e.key === "Enter") {
    $table = $('#namatabledatabase').val()
    $hits = $('#datamaximumdatabase').val()
        redirectlink('database',$table+'/'+$hits)
    }
}
function downloadlink(jenisdocumen,addr) {
  $.ajax({ 
    url: "../function/getdata.php",
    dataType: "JSON",
    type: "POST",
    cache: false,
    data: {
      "prosesdownloadlink": [jenisdocumen,addr]
    },
    success: function (data) {
      if (data.return == 1) {
        download(data.link)
      }
    },
  });
}

// ---------------- >> PKB
function submitmdpkb() {
  var norevisi = $('#norevisimdpkb').val()
  var name = $('#namemdpkb').val()
  var links = $('#linkmdpkb').val()
  var descriptions = $('#descriptionsmdpkb').val()

  $.ajax({ 
    url: "../function/getdata.php",
    dataType: "JSON",
    type: "POST",
    cache: false,
    data: {
      "prosessubmitmdpkb": [norevisi,
        name,
        links,
        descriptions]
    },
    success: function (data) {
      if (data.return == 1) {
        msgs()
        setTimeout(() => {
         redirectlink(data.link)
        }, data.time);
      }else{
        msgs(data.iconmsgs,data.msgs,3000)
      }
    },
  });
}
function delete_head_pkb(norevisi) {
  Swal.fire({
  icon: "question",
  text: "Non aktifkan data tersebut?",
  showDenyButton: true,
  showCancelButton: true,
  confirmButtonText: "Ya",
  denyButtonText: `Tidak`
  }).then((result) => {
    if (result.isConfirmed) {
      $.ajax({ 
        url: "../function/getdata.php",
        dataType: "JSON",
        type: "POST",
        cache: false,
        data: {
          "prosesdelete_head_pkb": norevisi
        },
        success: function (data) {
          if (data.return == 1) {
            msgs()
            setTimeout(() => {
            redirectlink(data.link)
            }, data.time);
          }else{
            msgs(data.iconmsgs,data.msgs,3000)
          }
        },
      });
    }
  })
}

// ---------------- >> COC
function submitmdcoc() {
  var norevisi = $('#norevisimdcoc').val()
  var header = $('#headermdcoc').val()
  var descriptions = $('#descriptionsmdcoc').val()

  $.ajax({ 
    url: "../function/getdata.php",
    dataType: "JSON",
    type: "POST",
    cache: false,
    data: {
      "prosessubmitmdcoc": [norevisi,
        header,
        descriptions]
    },
    success: function (data) {
      if (data.return == 1) {
        msgs()
        setTimeout(() => {
         redirectlink(data.link)
        }, data.time);
      }else{
        msgs(data.iconmsgs,data.msgs,3000)
      }
    },
  });
}
function delete_head_coc(norevisi) {
  Swal.fire({
  icon: "question",
  text: "Non aktifkan data tersebut?",
  showDenyButton: true,
  showCancelButton: true,
  confirmButtonText: "Ya",
  denyButtonText: `Tidak`
  }).then((result) => {
    if (result.isConfirmed) {
      $.ajax({ 
        url: "../function/getdata.php",
        dataType: "JSON",
        type: "POST",
        cache: false,
        data: {
          "prosesdelete_head_coc": norevisi
        },
        success: function (data) {
          if (data.return == 1) {
            msgs()
            setTimeout(() => {
            redirectlink(data.link)
            }, data.time);
          }else{
            msgs(data.iconmsgs,data.msgs,3000)
          }
        },
      });
    }
  })
}
function submitdocmdcoc() {
    const fileupload = $("#docaddrmdcoc").prop("files")[0];
    let formData = new FormData();
    formData.append("fileupload", fileupload);
    formData.append("dokumenid", $("#dokumenmdcoc").val());
    formData.append("docname", $("#docnamemdcoc").val());
    formData.append("typess", "document_coc");
      $.ajax({
        type: "POST",
        url: "../function/uploadimages.php",
        dataType: "JSON",
        data: formData,
        cache: false,
        processData: false,
        contentType: false,
        success: function (data) {
          if (data.return == 1) {
            msgs()
            setTimeout(() => {
            redirectlink(data.link)
            }, data.time);
          }else{
            msgs(data.iconmsgs,data.msgs,data.time)
          }
        },
      });
}
function delete_doc_coc(docid) {
  Swal.fire({
  icon: "question",
  text: "Hapus dokumen ini?",
  showDenyButton: true,
  showCancelButton: true,
  confirmButtonText: "Ya",
  denyButtonText: `Tidak`
  }).then((result) => {
    if (result.isConfirmed) {
      $.ajax({ 
        url: "../function/getdata.php",
        dataType: "JSON",
        type: "POST",
        cache: false,
        data: {
          "prosesdelete_doc_coc": docid
        },
        success: function (data) {
          if (data.return == 1) {
            msgs()
            setTimeout(() => {
            redirectlink(data.link)
            }, data.time);
          }else{
            msgs(data.iconmsgs,data.msgs,3000)
          }
        },
      });
    }
  })
}
function submitmdcocevent() {
  var calenderid = $('#calenderidmdcocevent').val()
  var eventname = $('#eventnamemdcocevent').val()
  var mulai = $('#mulaimdcocevent').val()
  var selesai = $('#selesaimdcocevent').val()
  var eventorg = $('#eventorgmdcocevent').val()
  var fasilitor = $('#fasilitormdcocevent').val()
  var topik = $('#topikmdcocevent').val()
  var lokasi = $('#lokasimdcocevent').val()

  $.ajax({ 
    url: "../function/getdata.php",
    dataType: "JSON",
    type: "POST",
    cache: false,
    data: {
      "prosessubmitmdcocevent": [calenderid,
        eventname,
        mulai,
        selesai,
      eventorg,
    fasilitor,
  topik,
lokasi]
    },
    success: function (data) {
      if (data.return == 1) {
        msgs()
        setTimeout(() => {
         redirectlink(data.link)
        }, data.time);
      }else{
        msgs(data.iconmsgs,data.msgs,3000)
      }
    },
  });
}
function delete_event_coc(calenderid) {
  Swal.fire({
  icon: "question",
  text: "Delete data tersebut?",
  showDenyButton: true,
  showCancelButton: true,
  confirmButtonText: "Ya",
  denyButtonText: `Tidak`
  }).then((result) => {
    if (result.isConfirmed) {
      $.ajax({ 
        url: "../function/getdata.php",
        dataType: "JSON",
        type: "POST",
        cache: false,
        data: {
          "prosesdelete_event_coc": calenderid
        },
        success: function (data) {
          if (data.return == 1) {
            msgs()
            setTimeout(() => {
            redirectlink(data.link)
            }, data.time);
          }else{
            msgs(data.iconmsgs,data.msgs,3000)
          }
        },
      });
    }
  })
}

// ---------------- >> WLKP
function submitmdwlkp() {
  var wlkpid = $('#wlkpidmdwlkp').val()
  var header = $('#headermdwlkp').val()
  var descriptions = $('#descriptionsmdwlkp').val()

  $.ajax({ 
    url: "../function/getdata.php",
    dataType: "JSON",
    type: "POST",
    cache: false,
    data: {
      "prosessubmitmdwlkp": [wlkpid,
        header,
        descriptions]
    },
    success: function (data) {
      if (data.return == 1) {
        msgs()
        setTimeout(() => {
         redirectlink(data.link)
        }, data.time);
      }else{
        msgs(data.iconmsgs,data.msgs,3000)
      }
    },
  });
}
function delete_head_wlkp(wlkpid) {
  Swal.fire({
  icon: "question",
  text: "Non aktifkan data tersebut?",
  showDenyButton: true,
  showCancelButton: true,
  confirmButtonText: "Ya",
  denyButtonText: `Tidak`
  }).then((result) => {
    if (result.isConfirmed) {
      $.ajax({ 
        url: "../function/getdata.php",
        dataType: "JSON",
        type: "POST",
        cache: false,
        data: {
          "prosesdelete_head_wlkp": wlkpid
        },
        success: function (data) {
          if (data.return == 1) {
            msgs()
            setTimeout(() => {
            redirectlink(data.link)
            }, data.time);
          }else{
            msgs(data.iconmsgs,data.msgs,3000)
          }
        },
      });
    }
  })
}
function submitdocmdwlkp() {
  const fileupload = $("#docaddrmdwlkp").prop("files")[0];
    let formData = new FormData();
    formData.append("fileupload", fileupload);
    formData.append("dokumenid", $("#dokumenmdwlkp").val());
    formData.append("docname", $("#docnamemdwlkp").val());
    formData.append("typess", "document_wlkp");
      $.ajax({
        type: "POST",
        url: "../function/uploadimages.php",
        dataType: "JSON",
        data: formData,
        cache: false,
        processData: false,
        contentType: false,
        success: function (data) {
          if (data.return == 1) {
            msgs()
            setTimeout(() => {
            redirectlink(data.link)
            }, data.time);
          }else{
            msgs(data.iconmsgs,data.msgs,data.time)
          }
        },
      });
}
function delete_doc_wlkp(wlkpid) {
  Swal.fire({
  icon: "question",
  text: "Non aktifkan data tersebut?",
  showDenyButton: true,
  showCancelButton: true,
  confirmButtonText: "Ya",
  denyButtonText: `Tidak`
  }).then((result) => {
    if (result.isConfirmed) {
      $.ajax({ 
        url: "../function/getdata.php",
        dataType: "JSON",
        type: "POST",
        cache: false,
        data: {
          "prosesdelete_doc_wlkp": wlkpid
        },
        success: function (data) {
          if (data.return == 1) {
            msgs()
            setTimeout(() => {
            redirectlink(data.link)
            }, data.time);
          }else{
            msgs(data.iconmsgs,data.msgs,3000)
          }
        },
      });
    }
  })
}

// ---------------- >> PKWT
function submitmdpkwt() {
  var pkwtid = $('#pkwtidmdpkwt').val()
  var header = $('#headermdpkwt').val()
  var descriptions = $('#descriptionsmdpkwt').val()

  $.ajax({ 
    url: "../function/getdata.php",
    dataType: "JSON",
    type: "POST",
    cache: false,
    data: {
      "prosessubmitmdpkwt": [pkwtid,
        header,
        descriptions]
    },
    success: function (data) {
      if (data.return == 1) {
        msgs()
        setTimeout(() => {
         redirectlink(data.link)
        }, data.time);
      }else{
        msgs(data.iconmsgs,data.msgs,3000)
      }
    },
  });
}
function delete_head_pkwt(pkwtid) {
  Swal.fire({
  icon: "question",
  text: "Non aktifkan data tersebut?",
  showDenyButton: true,
  showCancelButton: true,
  confirmButtonText: "Ya",
  denyButtonText: `Tidak`
  }).then((result) => {
    if (result.isConfirmed) {
      $.ajax({ 
        url: "../function/getdata.php",
        dataType: "JSON",
        type: "POST",
        cache: false,
        data: {
          "prosesdelete_head_pkwt": pkwtid
        },
        success: function (data) {
          if (data.return == 1) {
            msgs()
            setTimeout(() => {
            redirectlink(data.link)
            }, data.time);
          }else{
            msgs(data.iconmsgs,data.msgs,3000)
          }
        },
      });
    }
  })
}
function submitdocmdpkwt() {
  const fileupload = $("#docaddrmdpkwt").prop("files")[0];
    let formData = new FormData();
    formData.append("fileupload", fileupload);
    formData.append("dokumenid", $("#dokumenmdpkwt").val());
    formData.append("docname", $("#docnamemdpkwt").val());
    formData.append("typess", "document_pkwt");
      $.ajax({
        type: "POST",
        url: "../function/uploadimages.php",
        dataType: "JSON",
        data: formData,
        cache: false,
        processData: false,
        contentType: false,
        success: function (data) {
          if (data.return == 1) {
            msgs()
            setTimeout(() => {
            redirectlink(data.link)
            }, data.time);
          }else{
            msgs(data.iconmsgs,data.msgs,data.time)
          }
        },
      });
}
function delete_doc_pkwt(docid) {
  Swal.fire({
  icon: "question",
  text: "Hapus dokumen ini?",
  showDenyButton: true,
  showCancelButton: true,
  confirmButtonText: "Ya",
  denyButtonText: `Tidak`
  }).then((result) => {
    if (result.isConfirmed) {
      $.ajax({ 
        url: "../function/getdata.php",
        dataType: "JSON",
        type: "POST",
        cache: false,
        data: {
          "prosesdelete_doc_pkwt": docid
        },
        success: function (data) {
          if (data.return == 1) {
            msgs()
            setTimeout(() => {
            redirectlink(data.link)
            }, data.time);
          }else{
            msgs(data.iconmsgs,data.msgs,3000)
          }
        },
      });
    }
  })
}

// ---------------- >> LKS
function submitmdlks() {
  var lksid = $('#lksidmdlks').val()
  var header = $('#headmdlks').val()
  var descriptions = $('#descriptionsmdlks').val()

  $.ajax({ 
    url: "../function/getdata.php",
    dataType: "JSON",
    type: "POST",
    cache: false,
    data: {
      "prosessubmitmdlks": [lksid,
        header,
        descriptions]
    },
    success: function (data) {
      if (data.return == 1) {
        msgs()
        setTimeout(() => {
         redirectlink(data.link)
        }, data.time);
      }else{
        msgs(data.iconmsgs,data.msgs,3000)
      }
    },
  });
}
function delete_head_lks(lksid) {
  Swal.fire({
  icon: "question",
  text: "Non aktifkan data tersebut?",
  showDenyButton: true,
  showCancelButton: true,
  confirmButtonText: "Ya",
  denyButtonText: `Tidak`
  }).then((result) => {
    if (result.isConfirmed) {
      $.ajax({ 
        url: "../function/getdata.php",
        dataType: "JSON",
        type: "POST",
        cache: false,
        data: {
          "prosesdelete_head_lks": lksid
        },
        success: function (data) {
          if (data.return == 1) {
            msgs()
            setTimeout(() => {
            redirectlink(data.link)
            }, data.time);
          }else{
            msgs(data.iconmsgs,data.msgs,3000)
          }
        },
      });
    }
  })
}
function submitdocmdlks() {
  const fileupload = $("#docaddrmdlks").prop("files")[0];
    let formData = new FormData();
    formData.append("fileupload", fileupload);
    formData.append("dokumenid", $("#dokumenmdlks").val());
    formData.append("docname", $("#docnamemdlks").val());
    formData.append("typess", "document_lks");
      $.ajax({
        type: "POST",
        url: "../function/uploadimages.php",
        dataType: "JSON",
        data: formData,
        cache: false,
        processData: false,
        contentType: false,
        success: function (data) {
          if (data.return == 1) {
            msgs()
            setTimeout(() => {
            redirectlink(data.link)
            }, data.time);
          }else{
            msgs(data.iconmsgs,data.msgs,data.time)
          }
        },
  });
}
function submitmdnewslks() {
  var newsid = $('#newsidmdnewslks').val()
  var editor = $('#editormdnewslks').val()
  var konten = $('#kontenmdnewslks').val()
  var title = $('#titlemdnewslks').val()

  $.ajax({ 
    url: "../function/getdata.php",
    dataType: "JSON",
    type: "POST",
    cache: false,
    data: {
      "prosessubmitmdnewslks": [newsid,
        editor,
        konten,
        title]
    },
    success: function (data) {
      if (data.return == 1) {
        msgs()
        setTimeout(() => {
         redirectlink(data.link)
        }, data.time);
      }else{
        msgs(data.iconmsgs,data.msgs,3000)
      }
    },
  });
}
function delete_news_lks(newsid) {
  Swal.fire({
  icon: "question",
  text: "Non aktifkan data tersebut?",
  showDenyButton: true,
  showCancelButton: true,
  confirmButtonText: "Ya",
  denyButtonText: `Tidak`
  }).then((result) => {
    if (result.isConfirmed) {
      $.ajax({ 
        url: "../function/getdata.php",
        dataType: "JSON",
        type: "POST",
        cache: false,
        data: {
          "prosesdelete_news_lks": newsid
        },
        success: function (data) {
          if (data.return == 1) {
            msgs()
            setTimeout(() => {
            redirectlink(data.link)
            }, data.time);
          }else{
            msgs(data.iconmsgs,data.msgs,3000)
          }
        },
      });
    }
  })
}
function submitmdimglks() {
  const fileupload = $("#docaddrmdimglks").prop("files")[0];
    let formData = new FormData();
    formData.append("fileupload", fileupload);
    formData.append("imgid", $("#imgidmdimglks").val());
    formData.append("docname", $("#imgnamemdimglks").val());
    formData.append("docaddr", $("#docaddrmdimglks").val());
    formData.append("typess", "document_lks_img");
      $.ajax({
        type: "POST",
        url: "../function/uploadimages.php",
        dataType: "JSON",
        data: formData,
        cache: false,
        processData: false,
        contentType: false,
        success: function (data) {
          if (data.return == 1) {
            msgs()
            setTimeout(() => {
            redirectlink(data.link)
            }, data.time);
          }else{
            msgs(data.iconmsgs,data.msgs,data.time)
          }
        },
  });
}
function delete_doc_lks(docid) {
  Swal.fire({
  icon: "question",
  text: "Hapus dokumen ini?",
  showDenyButton: true,
  showCancelButton: true,
  confirmButtonText: "Ya",
  denyButtonText: `Tidak`
  }).then((result) => {
    if (result.isConfirmed) {
      $.ajax({ 
        url: "../function/getdata.php",
        dataType: "JSON",
        type: "POST",
        cache: false,
        data: {
          "prosesdelete_doc_lks": docid
        },
        success: function (data) {
          if (data.return == 1) {
            msgs()
            setTimeout(() => {
            redirectlink(data.link)
            }, data.time);
          }else{
            msgs(data.iconmsgs,data.msgs,3000)
          }
        },
      });
    }
  })
}
function delete_img_lks(imgid) {
  Swal.fire({
  icon: "question",
  text: "Hapus dokumen ini?",
  showDenyButton: true,
  showCancelButton: true,
  confirmButtonText: "Ya",
  denyButtonText: `Tidak`
  }).then((result) => {
    if (result.isConfirmed) {
      $.ajax({ 
        url: "../function/getdata.php",
        dataType: "JSON",
        type: "POST",
        cache: false,
        data: {
          "prosesdelete_img_lks": imgid
        },
        success: function (data) {
          if (data.return == 1) {
            msgs()
            setTimeout(() => {
            redirectlink(data.link)
            }, data.time);
          }else{
            msgs(data.iconmsgs,data.msgs,3000)
          }
        },
      });
    }
  })
}

// ---------------- >> SP
function submitmtdraftsp() {
  let formData = new FormData();
  const files = $("#lampiran").prop("files");

  const maxSize = 10 * 1024 * 1024;
  const allowedTypes = ["application/pdf", "image/jpeg", "image/png", "image/gif", "image/webp"];

  for (let i = 0; i < files.length; i++) {
    const file = files[i];
    if (file.size > maxSize) {
      msgs('info',"File " + file.name + " terlalu besar! Maksimal 10MB.",3000)
      return;
    }

    // Cek tipe
    if (!allowedTypes.includes(file.type)) {
      msgs('info',"File " + file.name + " File bukan image/PDF.",3000)
      return;
    }
    formData.append("lampiran[]", files[i]);
  }

  formData.append("spid", $("#spiddraftsp").val());
  formData.append("catatan", editorInstance.getData());
  formData.append("dokno", $("#doknodraftsp").val());
  formData.append("pernr", $("#pernrdraftsp").val());
  formData.append("jadwal", $("#jadwaldraftsp").val());
  formData.append("unit", $("#unitdraftsp").val());
  formData.append("rekonoleh", $("#rekonolehdraftsp").val());
  formData.append("bagian", $("#bagiandraftsp").val());
  formData.append("pelanggaran", $("#pelanggarandraftsp").val());
  formData.append("sangsi", $("#sangsidraftsp").val());
  formData.append("tglpelanggaran", $("#tglpelanggarandraftsp").val());
  formData.append("status", $("#statusdraftsp").val());
  formData.append("typess", "document_sp_draft");

  $.ajax({
    url: "../function/uploadimages.php",
    dataType: "JSON",
    type: "POST",
    data: formData,
    processData: false,
    contentType: false,
    success: function(data) {
      if (data.return == 1) {
          msgs()
          setTimeout(() => {
          redirectlink(data.link)
          }, data.time);
      }else{
        msgs(data.iconmsgs,data.msgs,data.time)
      }
    },
  });
}
function selectspdatabina(spid) {
  document.getElementById('t_dokumendatabina').innerHTML=null
  document.getElementById('t_dataspdatabina').innerHTML=null
  document.getElementById('t_karyawandatabina').innerHTML=null
  document.getElementById('t_pembinadatabina').innerHTML=null
  document.getElementById('tombolsimpandatabina').hidden=true
  if (spid != '') {
    document.getElementById('tombolsimpandatabina').hidden=false
    $.ajax({ 
    url: "../function/getdata.php",
    dataType: "JSON",
    type: "POST",
    cache: false,
    data: {
      "prosesselectspdatabina": spid
    },
    success: function (data) {
      if (data.return == 1) {
        document.getElementById('t_dokumendatabina').innerHTML=data.dokumen
        document.getElementById('t_dataspdatabina').innerHTML=data.datasp
        document.getElementById('t_karyawandatabina').innerHTML=data.karyawan
        document.getElementById('t_pembinadatabina').innerHTML=data.datapembina
      }
    },
    });
  }  
}
function simpandatabina() {
  Swal.fire({
  icon: "question",
  text: "Simpan data?",
  showDenyButton: true,
  showCancelButton: true,
  confirmButtonText: "Ya",
  denyButtonText: `Tidak`
  }).then((result) => {
    if (result.isConfirmed) {
      var spid = $('#spiddatabina').val()
      var tgl = $('#tglpembinaandatabina').val()
      var bina = $('#pembinadatabina').val()
      alert(spid)
      alert(tgl)
      alert(bina)
      $.ajax({ 
        url: "../function/getdata.php",
        dataType: "JSON",
        type: "POST",
        cache: false,
        data: {
          "prosessimpandatabina": [spid,
            tgl,bina]
        },
        success: function (data) {
          if (data.return == 1) {
                msgs()
                setTimeout(() => {
                redirectlink(data.link)
                }, data.time);
              }else{
                msgs(data.iconmsgs,data.msgs,data.time)
              }
        },
        });
    }
  })
}
function delete_head_sp(spid) {
  Swal.fire({
  icon: "question",
  text: "Hapus dokumen ini?",
  showDenyButton: true,
  showCancelButton: true,
  confirmButtonText: "Ya",
  denyButtonText: `Tidak`
  }).then((result) => {
    if (result.isConfirmed) {
      $.ajax({ 
        url: "../function/getdata.php",
        dataType: "JSON",
        type: "POST",
        cache: false,
        data: {
          "prosesdelete_head_sp": spid
        },
        success: function (data) {
          if (data.return == 1) {
            msgs()
            setTimeout(() => {
            redirectlink(data.link)
            }, data.time);
          }else{
            msgs(data.iconmsgs,data.msgs,3000)
          }
        },
      });
    }
  })
}

// ---------------- >> FARKES
function submitmdfarkes() {
  var farkesid = $('#farkesidmdfarkes').val()
  var header = $('#headmdfarkes').val()
  var descriptions = $('#descriptionsmdfarkes').val()

  $.ajax({ 
    url: "../function/getdata.php",
    dataType: "JSON",
    type: "POST",
    cache: false,
    data: {
      "prosessubmitmdfarkes": [farkesid,
        header,
        descriptions]
    },
    success: function (data) {
      if (data.return == 1) {
        msgs()
        setTimeout(() => {
         redirectlink(data.link)
        }, data.time);
      }else{
        msgs(data.iconmsgs,data.msgs,3000)
      }
    },
  });
}
function delete_head_farkes(farkesid) {
  Swal.fire({
  icon: "question",
  text: "Non aktifkan data tersebut?",
  showDenyButton: true,
  showCancelButton: true,
  confirmButtonText: "Ya",
  denyButtonText: `Tidak`
  }).then((result) => {
    if (result.isConfirmed) {
      $.ajax({ 
        url: "../function/getdata.php",
        dataType: "JSON",
        type: "POST",
        cache: false,
        data: {
          "prosesdelete_head_farkes": farkesid
        },
        success: function (data) {
          if (data.return == 1) {
            msgs()
            setTimeout(() => {
            redirectlink(data.link)
            }, data.time);
          }else{
            msgs(data.iconmsgs,data.msgs,3000)
          }
        },
      });
    }
  })
}
function submitdocmdfarkes() {
  const fileupload = $("#docaddrmdfarkes").prop("files")[0];
    let formData = new FormData();
    formData.append("fileupload", fileupload);
    formData.append("dokumenid", $("#dokumenmdfarkes").val());
    formData.append("docname", $("#docnamemdfarkes").val());
    formData.append("typess", "document_farkes");
      $.ajax({
        type: "POST",
        url: "../function/uploadimages.php",
        dataType: "JSON",
        data: formData,
        cache: false,
        processData: false,
        contentType: false,
        success: function (data) {
          if (data.return == 1) {
            msgs()
            setTimeout(() => {
            redirectlink(data.link)
            }, data.time);
          }else{
            msgs(data.iconmsgs,data.msgs,data.time)
          }
        },
  });
}
function submitmdnewsfarkes() {
  var newsid = $('#newsidmdnewsfarkes').val()
  var editor = $('#editormdnewsfarkes').val()
  var konten = $('#kontenmdnewsfarkes').val()
  var title = $('#titlemdnewsfarkes').val()

  $.ajax({ 
    url: "../function/getdata.php",
    dataType: "JSON",
    type: "POST",
    cache: false,
    data: {
      "prosessubmitmdnewsfarkes": [newsid,
        editor,
        konten,
        title]
    },
    success: function (data) {
      if (data.return == 1) {
        msgs()
        setTimeout(() => {
         redirectlink(data.link)
        }, data.time);
      }else{
        msgs(data.iconmsgs,data.msgs,3000)
      }
    },
  });
}
function submitmdimgfarkes() {
  const fileupload = $("#docaddrmdimgfarkes").prop("files")[0];
    let formData = new FormData();
    formData.append("fileupload", fileupload);
    formData.append("imgid", $("#imgidmdimgfarkes").val());
    formData.append("docname", $("#imgnamemdimgfarkes").val());
    formData.append("docaddr", $("#docaddrmdimgfarkes").val());
    formData.append("typess", "document_farkes_img");
      $.ajax({
        type: "POST",
        url: "../function/uploadimages.php",
        dataType: "JSON",
        data: formData,
        cache: false,
        processData: false,
        contentType: false,
        success: function (data) {
          if (data.return == 1) {
            msgs()
            setTimeout(() => {
            redirectlink(data.link)
            }, data.time);
          }else{
            msgs(data.iconmsgs,data.msgs,data.time)
          }
        },
  });
}
function delete_doc_farkes(docid) {
  Swal.fire({
  icon: "question",
  text: "Hapus dokumen ini?",
  showDenyButton: true,
  showCancelButton: true,
  confirmButtonText: "Ya",
  denyButtonText: `Tidak`
  }).then((result) => {
    if (result.isConfirmed) {
      $.ajax({ 
        url: "../function/getdata.php",
        dataType: "JSON",
        type: "POST",
        cache: false,
        data: {
          "prosesdelete_doc_farkes": docid
        },
        success: function (data) {
          if (data.return == 1) {
            msgs()
            setTimeout(() => {
            redirectlink(data.link)
            }, data.time);
          }else{
            msgs(data.iconmsgs,data.msgs,3000)
          }
        },
      });
    }
  })
}
function delete_img_farkes(imgid) {
  Swal.fire({
  icon: "question",
  text: "Hapus dokumen ini?",
  showDenyButton: true,
  showCancelButton: true,
  confirmButtonText: "Ya",
  denyButtonText: `Tidak`
  }).then((result) => {
    if (result.isConfirmed) {
      $.ajax({ 
        url: "../function/getdata.php",
        dataType: "JSON",
        type: "POST",
        cache: false,
        data: {
          "prosesdelete_img_farkes": imgid
        },
        success: function (data) {
          if (data.return == 1) {
            msgs()
            setTimeout(() => {
            redirectlink(data.link)
            }, data.time);
          }else{
            msgs(data.iconmsgs,data.msgs,3000)
          }
        },
      });
    }
  })
}

// ---------------- >> P2K3
function submitmdp2k3() {
  var p2k3id = $('#p2k3idmdp2k3').val()
  var header = $('#headmdp2k3').val()
  var descriptions = $('#descriptionsmdp2k3').val()

  $.ajax({ 
    url: "../function/getdata.php",
    dataType: "JSON",
    type: "POST",
    cache: false,
    data: {
      "prosessubmitmdp2k3": [p2k3id,
        header,
        descriptions]
    },
    success: function (data) {
      if (data.return == 1) {
        msgs()
        setTimeout(() => {
         redirectlink(data.link)
        }, data.time);
      }else{
        msgs(data.iconmsgs,data.msgs,3000)
      }
    },
  });
}
function delete_head_p2k3(p2k3id) {
  Swal.fire({
  icon: "question",
  text: "Non aktifkan data tersebut?",
  showDenyButton: true,
  showCancelButton: true,
  confirmButtonText: "Ya",
  denyButtonText: `Tidak`
  }).then((result) => {
    if (result.isConfirmed) {
      $.ajax({ 
        url: "../function/getdata.php",
        dataType: "JSON",
        type: "POST",
        cache: false,
        data: {
          "prosesdelete_head_p2k3": p2k3id
        },
        success: function (data) {
          if (data.return == 1) {
            msgs()
            setTimeout(() => {
            redirectlink(data.link)
            }, data.time);
          }else{
            msgs(data.iconmsgs,data.msgs,3000)
          }
        },
      });
    }
  })
}
function submitdocmdp2k3() {
  const fileupload = $("#docaddrmdp2k3").prop("files")[0];
    let formData = new FormData();
    formData.append("fileupload", fileupload);
    formData.append("dokumenid", $("#dokumenmdp2k3").val());
    formData.append("docname", $("#docnamemdp2k3").val());
    formData.append("typess", "document_p2k3");
      $.ajax({
        type: "POST",
        url: "../function/uploadimages.php",
        dataType: "JSON",
        data: formData,
        cache: false,
        processData: false,
        contentType: false,
        success: function (data) {
          if (data.return == 1) {
            msgs()
            setTimeout(() => {
            redirectlink(data.link)
            }, data.time);
          }else{
            msgs(data.iconmsgs,data.msgs,data.time)
          }
        },
  });
}
function delete_doc_p2k3(docid) {
  Swal.fire({
  icon: "question",
  text: "Hapus dokumen ini?",
  showDenyButton: true,
  showCancelButton: true,
  confirmButtonText: "Ya",
  denyButtonText: `Tidak`
  }).then((result) => {
    if (result.isConfirmed) {
      $.ajax({ 
        url: "../function/getdata.php",
        dataType: "JSON",
        type: "POST",
        cache: false,
        data: {
          "prosesdelete_doc_p2k3": docid
        },
        success: function (data) {
          if (data.return == 1) {
            msgs()
            setTimeout(() => {
            redirectlink(data.link)
            }, data.time);
          }else{
            msgs(data.iconmsgs,data.msgs,3000)
          }
        },
      });
    }
  })
}
function submitmdnewsp2k3() {
  var newsid = $('#newsidmdnewsp2k3').val()
  var editor = $('#editormdnewsp2k3').val()
  var konten = $('#kontenmdnewsp2k3').val()
  var title = $('#titlemdnewsp2k3').val()

  $.ajax({ 
    url: "../function/getdata.php",
    dataType: "JSON",
    type: "POST",
    cache: false,
    data: {
      "prosessubmitmdnewsp2k3": [newsid,
        editor,
        konten,
        title]
    },
    success: function (data) {
      if (data.return == 1) {
        msgs()
        setTimeout(() => {
         redirectlink(data.link)
        }, data.time);
      }else{
        msgs(data.iconmsgs,data.msgs,3000)
      }
    },
  });
}
function delete_news_p2k3(newsid) {
  Swal.fire({
  icon: "question",
  text: "Non aktifkan data tersebut?",
  showDenyButton: true,
  showCancelButton: true,
  confirmButtonText: "Ya",
  denyButtonText: `Tidak`
  }).then((result) => {
    if (result.isConfirmed) {
      $.ajax({ 
        url: "../function/getdata.php",
        dataType: "JSON",
        type: "POST",
        cache: false,
        data: {
          "prosesdelete_news_p2k3": newsid
        },
        success: function (data) {
          if (data.return == 1) {
            msgs()
            setTimeout(() => {
            redirectlink(data.link)
            }, data.time);
          }else{
            msgs(data.iconmsgs,data.msgs,3000)
          }
        },
      });
    }
  })
}
function submitmdp2k3sidak() {
  let formData = new FormData();
  const files = $("#lampiransidak").prop("files");

  const maxSize = 10 * 1024 * 1024;
  const allowedTypes = ["application/pdf", "image/jpeg", "image/png", "image/gif", "image/webp"];

  for (let i = 0; i < files.length; i++) {
    const file = files[i];
    if (file.size > maxSize) {
      msgs('info',"File " + file.name + " terlalu besar! Maksimal 10MB.",3000)
      return;
    }

    // Cek tipe
    if (!allowedTypes.includes(file.type)) {
      msgs('info',"File " + file.name + " File bukan image/PDF.",3000)
      return;
    }
    formData.append("lampiransidak[]", files[i]);
  }

  formData.append("p2k3id", $("#p2k3idmdsidakp2k3").val());
  formData.append("catatan", editorInstance.getData());
  formData.append("tgl", $("#tglmdsidakp2k3").val());
  formData.append("pernr", $("#pernrmdsidakp2k3").val());
  formData.append("unitid", $("#unitmdsidakp2k3").val());
  formData.append("typess", "document_sidak_p2k3");

  $.ajax({
    url: "../function/uploadimages.php",
    dataType: "JSON",
    type: "POST",
    data: formData,
    processData: false,
    contentType: false,
    success: function(data) {
      if (data.return == 1) {
          msgs()
          setTimeout(() => {
          redirectlink(data.link)
          }, data.time);
      }else{
        msgs(data.iconmsgs,data.msgs,data.time)
      }
    },
  });
}
function delete_sidak_p2k3(p2k3id) {
  Swal.fire({
  icon: "question",
  text: "Hapus data tersebut?",
  showDenyButton: true,
  showCancelButton: true,
  confirmButtonText: "Ya",
  denyButtonText: `Tidak`
  }).then((result) => {
    if (result.isConfirmed) {
      $.ajax({ 
        url: "../function/getdata.php",
        dataType: "JSON",
        type: "POST",
        cache: false,
        data: {
          "prosesdelete_sidak_p2k3": p2k3id
        },
        success: function (data) {
          if (data.return == 1) {
            msgs()
            setTimeout(() => {
            redirectlink(data.link)
            }, data.time);
          }else{
            msgs(data.iconmsgs,data.msgs,3000)
          }
        },
      });
    }
  })
}

// ---------------- >> SIDO
function submitmdsido() {
  var sidoid = $('#sidomdsido').val()
  var header = $('#headmdsido').val()
  var descriptions = $('#descriptionsmdsido').val()
  $.ajax({ 
    url: "../function/getdata.php",
    dataType: "JSON",
    type: "POST",
    cache: false,
    data: {
      "prosessubmitmdsido": [sidoid,
        header,
        descriptions]
    },
    success: function (data) {
      if (data.return == 1) {
        msgs()
        setTimeout(() => {
         redirectlink(data.link)
        }, data.time);
      }else{
        msgs(data.iconmsgs,data.msgs,3000)
      }
    },
  });
}
function delete_head_sido(sidoid) {
  Swal.fire({
  icon: "question",
  text: "Non aktifkan data tersebut?",
  showDenyButton: true,
  showCancelButton: true,
  confirmButtonText: "Ya",
  denyButtonText: `Tidak`
  }).then((result) => {
    if (result.isConfirmed) {
      $.ajax({ 
        url: "../function/getdata.php",
        dataType: "JSON",
        type: "POST",
        cache: false,
        data: {
          "prosesdelete_head_sido": sidoid
        },
        success: function (data) {
          if (data.return == 1) {
            msgs()
            setTimeout(() => {
            redirectlink(data.link)
            }, data.time);
          }else{
            msgs(data.iconmsgs,data.msgs,3000)
          }
        },
      });
    }
  })
}
function submitmdsidodoc() {
  let formData = new FormData();
  const files = $("#lampiransido").prop("files");

  const maxSize = 10 * 1024 * 1024;
  const allowedTypes = ["application/pdf", "image/jpeg", "image/png", "image/gif", "image/webp"];

  for (let i = 0; i < files.length; i++) {
    const file = files[i];
    if (file.size > maxSize) {
      msgs('info',"File " + file.name + " terlalu besar! Maksimal 10MB.",3000)
      return;
    }

    // Cek tipe
    if (!allowedTypes.includes(file.type)) {
      msgs('info',"File " + file.name + " File bukan image/PDF.",3000)
      return;
    }
    formData.append("lampiransido[]", files[i]);
  }

  formData.append("sidoid", $("#sidoidmdsido").val());
  formData.append("catatan", editorInstance.getData());
  formData.append("tglfrom", $("#tglfrommdsido").val());
  formData.append("tglto", $("#tgltomdsido").val());
  formData.append("jeniskegiatan", $("#jeniskegiatanmdsido").val());
  formData.append("namakegiatan", $("#namakegiatanmdsido").val());
  formData.append("typess", "document_sido");

  $.ajax({
    url: "../function/uploadimages.php",
    dataType: "JSON",
    type: "POST",
    data: formData,
    processData: false,
    contentType: false,
    success: function(data) {
      if (data.return == 1) {
          msgs()
          setTimeout(() => {
          redirectlink(data.link)
          }, data.time);
      }else{
        msgs(data.iconmsgs,data.msgs,data.time)
      }
    },
  });
}
function delete_doc_sido(sidoid) {
  Swal.fire({
  icon: "question",
  text: "Hapus data tersebut?",
  showDenyButton: true,
  showCancelButton: true,
  confirmButtonText: "Ya",
  denyButtonText: `Tidak`
  }).then((result) => {
    if (result.isConfirmed) {
      $.ajax({ 
        url: "../function/getdata.php",
        dataType: "JSON",
        type: "POST",
        cache: false,
        data: {
          "prosesdelete_doc_sido": sidoid
        },
        success: function (data) {
          if (data.return == 1) {
            msgs()
            setTimeout(() => {
            redirectlink(data.link)
            }, data.time);
          }else{
            msgs(data.iconmsgs,data.msgs,3000)
          }
        },
      });
    }
  })
}



// ---------------- >> PENGUMUMAN
function submitmdnoticehead() {
  let formData = new FormData();
  const files = $("#lampirannoticehead").prop("files");

  const maxSize = 10 * 1024 * 1024;
  const allowedTypes = ["application/pdf", "image/jpeg", "image/png", "image/gif", "image/webp"];

  for (let i = 0; i < files.length; i++) {
    const file = files[i];
    if (file.size > maxSize) {
      msgs('info',"File " + file.name + " terlalu besar! Maksimal 10MB.",3000)
      return;
    }

    // Cek tipe
    if (!allowedTypes.includes(file.type)) {
      msgs('info',"File " + file.name + " File bukan image/PDF.",3000)
      return;
    }
    formData.append("lampirannoticehead[]", files[i]);
  }

  formData.append("noticeid", $("#noticeidmdnoticehead").val());
  formData.append("catatan", editorInstance.getData());
  formData.append("header", $("#headmdnoticehead").val());
  formData.append("typess", "document_notice");

  $.ajax({
    url: "../function/uploadimages.php",
    dataType: "JSON",
    type: "POST",
    data: formData,
    processData: false,
    contentType: false,
    success: function(data) {
      if (data.return == 1) {
          msgs()
          setTimeout(() => {
          redirectlink(data.link)
          }, data.time);
      }else{
        msgs(data.iconmsgs,data.msgs,data.time)
      }
    },
  });
}


