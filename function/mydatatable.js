$(document).ready( function () {
    const time = 3000;
    $('.select2').select2();
    // -----> PKB
    $('#table_displaypkb').DataTable({
        processing: true,
        serverSide: true,
        ajax: {
        url: "../function/serverside.php",
        type: "POST",
        data: { "table": "table_datapkb" }
        },
        columns: [
        { 
            data: null,
            render: function(data, type, row) {
                return `
                    <a href="#" onclick="redirectlink('md_pkb_create','${row.norevisi}')" title="Change"><img src="../assets/icon/pencil-white.png"></a> |
                    <a href="#" onclick="delete_head_pkb('${row.norevisi}')" title="Delete"><img src="../assets/icon/trash-white.png"></a>
                `;
            }
        },
        { data: "norevisi" },
        { data: "descriptions" },
        { 
            data: "link",
            render: function(data, type, row) {
                return `
                    <a href="${row.link}" target="_blank" title="Download">${row.link}</a>
                `;
            }
        },
        {
            data: "text_descriptions",
            render: function(data, type, row) {
            if (!data) return "";
            var plainText = data.replace(/<[^>]*>/g, '');
            return plainText.length > 20 ? plainText.substring(0, 20) + "..." : plainText;
            }
        },
        { 
            data: "createdon",
            render: function(data, type, row) {
                if (!data) return "";
                let d = new Date(data);
                let day   = ("0" + d.getDate()).slice(-2);
                let month = ("0" + (d.getMonth() + 1)).slice(-2);
                let year  = d.getFullYear();

                return `${day}.${month}.${year}`;
            }
        },
        
        // { data: "createdby" },
        // { data: "createdon" }
        ],
        pageLength: 10, // default tampil 10 baris
        dom: 'Bfrtip',
        buttons: [
        {
            text: 'Tambah Data',
            className: 'btn btn-sm btn-success',
            action: function () {
             redirectlink('md_pkb_create')
            }
        },
        'excel'
        ]
    });

    // -----> COC
    $('#table_displaycoc_event').DataTable({
        processing: true,
        serverSide: true,
        ajax: {
        url: "../function/serverside.php",
        type: "POST",
        data: { "table": "table_datacoc_e" }
        },
        columns: [
        { 
            data: null,
            render: function(data, type, row) {
                return `
                    <a href="#" onclick="redirectlink('md_coc_event_create','${row.calenderid}')" title="Change"><img src="../assets/icon/pencil-white.png"></a> |
                    <a href="#" onclick="delete_event_coc('${row.calenderid}')" title="Delete"><img src="../assets/icon/trash-white.png"></a>
                `;
            }
        },
        {
            targets: 0, // kolom pertama untuk nomor urut
            render: function (data, type, row, meta) {
                return meta.row + meta.settings._iDisplayStart + 1;
            }
        },
        { data: "eventname" },
        { data: "eventstart" },
        { data: "eventfinish" },
        { data: "eventfacilitor" },
        { data: "eventorganizer" },
        {
            data: "eventtopics",
            render: function(data, type, row) {
                if (!data) return "";
                return data.length > 10 ? data.substring(0, 20) + "..." : data;
        },
        },
        { data: "eventlocation" },
        ],
        pageLength: 10,
        dom: 'Bfrtip',
        buttons: [
        {
            text: 'Tambah Data',
            className: 'btn btn-sm btn-success',
            action: function () {
             redirectlink('md_coc_event_create')
            }
        },
        'excel'
        ]
    });
     $('#table_displaycoc_dokumen').DataTable({
        processing: true,
        serverSide: true,
        ajax: {
        url: "../function/serverside.php",
        type: "POST",
        data: { "table": "table_datacoc_d" }
        },
        columns: [
        { 
            data: null,
            render: function(data, type, row) {
                return `
                    <a href="#" onclick="redirectlink('md_coc_doc_create','${row.documenid}')" title="Change"><img src="../assets/icon/pencil-white.png"></a> |
                    <a href="#" onclick="delete_doc_coc('${row.documenid}')" title="Delete"><img src="../assets/icon/trash-white.png"></a>
                `;
            }
        },
            {
            targets: 0, // kolom pertama untuk nomor urut
            render: function (data, type, row, meta) {
                return meta.row + meta.settings._iDisplayStart + 1;
            }
        },
        {
            data: "documenname",
            render: function(data, type, row) {
                if (!data) return "";
                return data.length > 10 ? data.substring(0, 20) + "..." : data;
            },
        },
        { 
            data: "documenaddress",
            render: function(data, type, row) {
                return `
                    <a href="#" onclick="downloadlink(1,'${row.documenaddress}')" title="Download">${row.documenaddress}</a>
                `;
            }
        },
        { 
            data: "createdon",
            render: function(data, type, row) {
                if (!data) return "";
                let d = new Date(data);
                let day   = ("0" + d.getDate()).slice(-2);
                let month = ("0" + (d.getMonth() + 1)).slice(-2);
                let year  = d.getFullYear();

                return `${day}.${month}.${year}`;
            }
        },
        ],
        pageLength: 10,
        dom: 'Bfrtip',
        buttons: [
        {
            text: 'Tambah Data',
            className: 'btn btn-sm btn-success',
            action: function () {
             redirectlink('md_coc_doc_create')
            }
        },
        'excel'
        ]
    });
     $('#table_displaycoc_head').DataTable({
        processing: true,
        serverSide: true,
        ajax: {
        url: "../function/serverside.php",
        type: "POST",
        data: { "table": "table_datacoc_h" }
        },
        columns: [
        { 
            data: null,
            render: function(data, type, row) {
                return `
                    <a href="#" onclick="redirectlink('md_coc_head_create','${row.cocid}')" title="Change"><img src="../assets/icon/pencil-white.png"></a> |
                    <a href="#" onclick="delete_head_coc('${row.cocid}')" title="Delete"><img src="../assets/icon/trash-white.png"></a>
                `;
            }
        },
        { data: "cocid" },
        {
            data: "cocdescriptions",
            render: function(data, type, row) {
            if (!data) return "";
            var plainText = data.replace(/<[^>]*>/g, '');
            return plainText.length > 20 ? plainText.substring(0, 20) + "..." : plainText;
            }
        },
        { data: "cochead" },
        { 
            data: "createdon",
            render: function(data, type, row) {
                if (!data) return "";
                let d = new Date(data);
                let day   = ("0" + d.getDate()).slice(-2);
                let month = ("0" + (d.getMonth() + 1)).slice(-2);
                let year  = d.getFullYear();

                return `${day}.${month}.${year}`;
            }
        },
        ],
        pageLength: 10,
        dom: 'Bfrtip',
        buttons: [
        {
            text: 'Tambah Data',
            className: 'btn btn-sm btn-success',
            action: function () {
             redirectlink('md_coc_head_create')
            }
        },
        'excel'
        ]
    });

    // -----> WLKP
    $('#table_displaywlkp_head').DataTable({
        processing: true,
        serverSide: true,
        ajax: {
        url: "../function/serverside.php",
        type: "POST",
        data: { "table": "table_datawlkp_h" }
        },
        columns: [
        { 
            data: null,
            render: function(data, type, row) {
                return `
                    <a href="#" onclick="redirectlink('md_wlkp_head_create','${row.wlkpid}')" title="Change"><img src="../assets/icon/pencil-white.png"></a> |
                    <a href="#" onclick="delete_head_wlkp('${row.wlkpid}')" title="Delete"><img src="../assets/icon/trash-white.png"></a>
                `;
            }
        },
        { data: "wlkpid" },
        {
            data: "wlkpdescriptions",
            render: function(data, type, row) {
            if (!data) return "";
            var plainText = data.replace(/<[^>]*>/g, '');
            return plainText.length > 20 ? plainText.substring(0, 20) + "..." : plainText;
            }
        },
        { data: "wlkpheader" },
        { 
            data: "createdon",
            render: function(data, type, row) {
                if (!data) return "";
                let d = new Date(data);
                let day   = ("0" + d.getDate()).slice(-2);
                let month = ("0" + (d.getMonth() + 1)).slice(-2);
                let year  = d.getFullYear();

                return `${day}.${month}.${year}`;
            }
        },
        ],
        pageLength: 10,
        dom: 'Bfrtip',
        buttons: [
        {
            text: 'Tambah Data',
            className: 'btn btn-sm btn-success',
            action: function () {
             redirectlink('md_wlkp_head_create')
            }
        },
        'excel'
        ]
    });
    $('#table_displaywlkp_dokumen').DataTable({
        processing: true,
        serverSide: true,
        ajax: {
        url: "../function/serverside.php",
        type: "POST",
        data: { "table": "table_datawlkp_d" }
        },
        columns: [
        { 
            data: null,
            render: function(data, type, row) {
                return `
                    <a href="#" onclick="redirectlink('md_wlkp_doc_create','${row.documenid}')" title="Change"><img src="../assets/icon/pencil-white.png"></a> |
                    <a href="#" onclick="delete_doc_wlkp('${row.documenid}')" title="Delete"><img src="../assets/icon/trash-white.png"></a>
                `;
            }
        },
        { data: "documenid" },
        {
            data: "documenname",
            render: function(data, type, row) {
                if (!data) return "";
                return data.length > 10 ? data.substring(0, 20) + "..." : data;
            },
        },
        { 
            data: "documenaddress",
            render: function(data, type, row) {
                return `
                    <a href="#" onclick="downloadlink(2,'${row.documenaddress}')" title="Download">${row.documenaddress}</a>
                `;
            }
        },
        { 
            data: "createdon",
            render: function(data, type, row) {
                if (!data) return "";
                let d = new Date(data);
                let day   = ("0" + d.getDate()).slice(-2);
                let month = ("0" + (d.getMonth() + 1)).slice(-2);
                let year  = d.getFullYear();

                return `${day}.${month}.${year}`;
            }
        },
        ],
        pageLength: 10,
        dom: 'Bfrtip',
        buttons: [
        {
            text: 'Tambah Data',
            className: 'btn btn-sm btn-success',
            action: function () {
             redirectlink('md_wlkp_doc_create')
            }
        },
        'excel'
        ]
    });

    // -----> PKWT
    $('#table_displaypkwt_head').DataTable({
        processing: true,
        serverSide: true,
        ajax: {
        url: "../function/serverside.php",
        type: "POST",
        data: { "table": "table_datapkwt_h" }
        },
        columns: [
        { 
            data: null,
            render: function(data, type, row) {
                return `
                    <a href="#" onclick="redirectlink('md_pkwt_head_create','${row.pkwtid}')" title="Change"><img src="../assets/icon/pencil-white.png"></a> |
                    <a href="#" onclick="delete_head_pkwt('${row.pkwtid}')" title="Delete"><img src="../assets/icon/trash-white.png"></a>
                `;
            }
        },
        { data: "pkwtid" },
        {
            data: "pkwtdescriptions",
            render: function(data, type, row) {
            if (!data) return "";
            var plainText = data.replace(/<[^>]*>/g, '');
            return plainText.length > 20 ? plainText.substring(0, 20) + "..." : plainText;
            }
        },
        { data: "pkwtheader" },
        { 
            data: "createdon",
            render: function(data, type, row) {
                if (!data) return "";
                let d = new Date(data);
                let day   = ("0" + d.getDate()).slice(-2);
                let month = ("0" + (d.getMonth() + 1)).slice(-2);
                let year  = d.getFullYear();

                return `${day}.${month}.${year}`;
            }
        },
        ],
        pageLength: 10,
        dom: 'Bfrtip',
        buttons: [
        {
            text: 'Tambah Data',
            className: 'btn btn-sm btn-success',
            action: function () {
             redirectlink('md_pkwt_head_create')
            }
        },
        'excel'
        ]
    });
    $('#table_displaypkwt_dokumen').DataTable({
        processing: true,
        serverSide: true,
        ajax: {
        url: "../function/serverside.php",
        type: "POST",
        data: { "table": "table_datapkwt_d" }
        },
        columns: [
        { 
            data: null,
            render: function(data, type, row) {
                return `
                    <a href="#" onclick="redirectlink('md_pkwt_doc_create','${row.documenid}')" title="Change"><img src="../assets/icon/pencil-white.png"></a> |
                    <a href="#" onclick="delete_doc_pkwt('${row.documenid}')" title="Delete"><img src="../assets/icon/trash-white.png"></a>
                `;
            }
        },
        { data: "documenid" },
        {
            data: "documenname",
            render: function(data, type, row) {
                if (!data) return "";
                return data.length > 10 ? data.substring(0, 20) + "..." : data;
            },
        },
        { 
            data: "documenaddress",
            render: function(data, type, row) {
                return `
                    <a href="#" onclick="downloadlink(3,'${row.documenaddress}')" title="Download">${row.documenaddress}</a>
                `;
            }
        },
        { 
            data: "createdon",
            render: function(data, type, row) {
                if (!data) return "";
                let d = new Date(data);
                let day   = ("0" + d.getDate()).slice(-2);
                let month = ("0" + (d.getMonth() + 1)).slice(-2);
                let year  = d.getFullYear();

                return `${day}.${month}.${year}`;
            }
        },
        ],
        pageLength: 10,
        dom: 'Bfrtip',
        buttons: [
        {
            text: 'Tambah Data',
            className: 'btn btn-sm btn-success',
            action: function () {
             redirectlink('md_pkwt_doc_create')
            }
        },
        'excel'
        ]
    });

    // -----> LKS
    $('#table_displaylks_head').DataTable({
        processing: true,
        serverSide: true,
        ajax: {
        url: "../function/serverside.php",
        type: "POST",
        data: { "table": "table_datalks_h" }
        },
        columns: [
        { 
            data: null,
            render: function(data, type, row) {
                return `
                    <a href="#" onclick="redirectlink('md_lks_head_create','${row.lksid}')" title="Change"><img src="../assets/icon/pencil-white.png"></a> |
                    <a href="#" onclick="delete_head_lks('${row.lksid}')" title="Delete"><img src="../assets/icon/trash-white.png"></a>
                `;
            }
        },
        { data: "lksid" },
        {
            data: "lksdescriptions",
            render: function(data, type, row) {
            if (!data) return "";
            var plainText = data.replace(/<[^>]*>/g, '');
            return plainText.length > 20 ? plainText.substring(0, 20) + "..." : plainText;
            }
        },
        { data: "lksheader" },
        { 
            data: "createdon",
            render: function(data, type, row) {
                if (!data) return "";
                let d = new Date(data);
                let day   = ("0" + d.getDate()).slice(-2);
                let month = ("0" + (d.getMonth() + 1)).slice(-2);
                let year  = d.getFullYear();

                return `${day}.${month}.${year}`;
            }
        },
        ],
        pageLength: 10,
        dom: 'Bfrtip',
        buttons: [
        {
            text: 'Tambah Data',
            className: 'btn btn-sm btn-success',
            action: function () {
             redirectlink('md_lks_head_create')
            }
        },
        'excel'
        ]
    });
    $('#table_displaylks_dokumen').DataTable({
        processing: true,
        serverSide: true,
        ajax: {
        url: "../function/serverside.php",
        type: "POST",
        data: { "table": "table_datalks_d" }
        },
        columns: [
        { 
            data: null,
            render: function(data, type, row) {
                return `
                    <a href="#" onclick="redirectlink('md_lks_doc_create','${row.documenid}')" title="Change"><img src="../assets/icon/pencil-white.png"></a> |
                    <a href="#" onclick="delete_doc_lks('${row.documenid}')" title="Delete"><img src="../assets/icon/trash-white.png"></a>
                `;
            }
        },
        { data: "documenid" },
        {
            data: "documenname",
            render: function(data, type, row) {
                if (!data) return "";
                return data.length > 10 ? data.substring(0, 20) + "..." : data;
            },
        },
        { 
            data: "documenaddress",
            render: function(data, type, row) {
                return `
                    <a href="#" onclick="downloadlink(4,'${row.documenaddress}')" title="Download">${row.documenaddress}</a>
                `;
            }
        },
        { 
            data: "createdon",
            render: function(data, type, row) {
                if (!data) return "";
                let d = new Date(data);
                let day   = ("0" + d.getDate()).slice(-2);
                let month = ("0" + (d.getMonth() + 1)).slice(-2);
                let year  = d.getFullYear();

                return `${day}.${month}.${year}`;
            }
        },
        ],
        pageLength: 10,
        dom: 'Bfrtip',
        buttons: [
        {
            text: 'Tambah Data',
            className: 'btn btn-sm btn-success',
            action: function () {
             redirectlink('md_lks_doc_create')
            }
        },
        'excel'
        ]
    });
     $('#table_displaylks_news').DataTable({
        processing: true,
        serverSide: true,
        ajax: {
        url: "../function/serverside.php",
        type: "POST",
        data: { "table": "table_datalks_n" }
        },
        columns: [
        { 
            data: null,
            render: function(data, type, row) {
                return `
                    <a href="#" onclick="redirectlink('md_lks_news_create','${row.newsid}')" title="Change"><img src="../assets/icon/pencil-white.png"></a> |
                    <a href="#" onclick="delete_news_lks('${row.newsid}')" title="Delete"><img src="../assets/icon/trash-white.png"></a>
                `;
            }
        },
        { data: "newsid" },
        { data: "newseditor" },
        {
            data: "newstitle",
            render: function(data, type, row) {
                if (!data) return "";
                return data.length > 10 ? data.substring(0, 20) + "..." : data;
            },
        },
        {
            data: "newscontent",
            render: function(data, type, row) {
            if (!data) return "";
            var plainText = data.replace(/<[^>]*>/g, '');
            return plainText.length > 20 ? plainText.substring(0, 20) + "..." : plainText;
            }
        },
        ],
        pageLength: 10,
        dom: 'Bfrtip',
        buttons: [
        {
            text: 'Tambah Data',
            className: 'btn btn-sm btn-success',
            action: function () {
             redirectlink('md_lks_news_create')
            }
        },
        'excel'
        ]
    });
    $('#table_displaylks_img').DataTable({
        processing: true,
        serverSide: true,
        ajax: {
        url: "../function/serverside.php",
        type: "POST",
        data: { "table": "table_datalks_g" }
        },
        columns: [
        { 
            data: null,
            render: function(data, type, row) {
                return `
                    <a href="#" onclick="redirectlink('md_lks_img_create','${row.imgid}')" title="Change"><img src="../assets/icon/pencil-white.png"></a> |
                    <a href="#" onclick="delete_img_lks('${row.imgid}')" title="Delete"><img src="../assets/icon/trash-white.png"></a>
                `;
            }
        },
        { data: "imgid" },
        { data: "imgthemes" },
        { 
            data: "imgaddress",
            render: function(data, type, row) {
                return `
                    <a href="#" onclick="downloadlink(5,'${row.imgaddress}')" title="Download">${row.imgaddress}</a>
                `;
            }
        },
        { 
            data: "createdon",
            render: function(data, type, row) {
                if (!data) return "";
                let d = new Date(data);
                let day   = ("0" + d.getDate()).slice(-2);
                let month = ("0" + (d.getMonth() + 1)).slice(-2);
                let year  = d.getFullYear();

                return `${day}.${month}.${year}`;
            }
        },
        ],
        pageLength: 10,
        dom: 'Bfrtip',
        buttons: [
        {
            text: 'Tambah Data',
            className: 'btn btn-sm btn-success',
            action: function () {
             redirectlink('md_lks_img_create')
            }
        },
        'excel'
        ]
    });

    // -----> SP
    $('#table_displaysp_reporting').DataTable({
        processing: true,
        serverSide: true,
        ajax: {
        url: "../function/serverside.php",
        type: "POST",
        data: { "table": "table_datasp_doc" }
        },
        columns: [
        { 
            data: null,
            render: function(data, type, row) {
                return `
                    <a href="#" onclick="delete_head_sp('${row.spid }')" title="Delete"><img src="../assets/icon/trash-white.png"></a>
                `;
            }
        },
        { data: "spid" },
        { data: "nodocumen" },
        { 
            data: "tglpelanggaran",
            render: function (data, type, row) {
                if (!data) return ""; // kalau null/empty
                let d = new Date(data);
                let day = ("0" + d.getDate()).slice(-2);
                let month = ("0" + (d.getMonth() + 1)).slice(-2);
                let year = d.getFullYear();
                return `${day}.${month}.${year}`;
            }
        },
        { data: "pernr" },
        { data: "unitid" },
        { data: "unitbagian" },
        { data: "idviolation" },
        { data: "sancid" },
        { data: "spstatus" },
        ],
        pageLength: 10,
        dom: 'Bfrtip',
        buttons: [
        {
            text: 'Buat Draft SP',
            className: 'btn btn-sm btn-success',
            action: function () {
             redirectlink('md_sp_draft_create')
            }
        },
        {
            text: 'Buat Rekonsiliasi SP',
            className: 'btn btn-sm btn-success',
            action: function () {
             redirectlink('md_sp_bina')
            }
        },
        {
            text: 'Laporan',
            className: 'btn btn-sm btn-success',
            action: function () {
             redirectlink('md_sp_report')
            }
        },
        // 'pdf'
        ]
    });

    // -----> FARKES
    $('#table_displayfarkes_head').DataTable({
        processing: true,
        serverSide: true,
        ajax: {
        url: "../function/serverside.php",
        type: "POST",
        data: { "table": "table_datafarkes_h" }
        },
        columns: [
        { 
            data: null,
            render: function(data, type, row) {
                return `
                    <a href="#" onclick="redirectlink('md_farkes_head_create','${row.farkesid}')" title="Change"><img src="../assets/icon/pencil-white.png"></a> |
                    <a href="#" onclick="delete_head_farkes('${row.farkesid}')" title="Delete"><img src="../assets/icon/trash-white.png"></a>
                `;
            }
        },
        { data: "farkesid" },
        { data: "farkesheader" },
        {
            data: "farkesdescriptions",
            render: function(data, type, row) {
            if (!data) return "";
            var plainText = data.replace(/<[^>]*>/g, '');
            return plainText.length > 20 ? plainText.substring(0, 20) + "..." : plainText;
            }
        },
        { 
            data: "createdon",
            render: function(data, type, row) {
                if (!data) return "";
                let d = new Date(data);
                let day   = ("0" + d.getDate()).slice(-2);
                let month = ("0" + (d.getMonth() + 1)).slice(-2);
                let year  = d.getFullYear();

                return `${day}.${month}.${year}`;
            }
        },
        ],
        pageLength: 10,
        dom: 'Bfrtip',
        buttons: [
        {
            text: 'Tambah Data',
            className: 'btn btn-sm btn-success',
            action: function () {
             redirectlink('md_farkes_head_create')
            }
        },
        'excel'
        ]
    });
    $('#table_displayfarkes_dokumen').DataTable({
        processing: true,
        serverSide: true,
        ajax: {
        url: "../function/serverside.php",
        type: "POST",
        data: { "table": "table_datafarkes_d" }
        },
        columns: [
        { 
            data: null,
            render: function(data, type, row) {
                return `
                    <a href="#" onclick="redirectlink('md_farkes_doc_create','${row.documenid}')" title="Change"><img src="../assets/icon/pencil-white.png"></a> |
                    <a href="#" onclick="delete_doc_farkes('${row.documenid}')" title="Delete"><img src="../assets/icon/trash-white.png"></a>
                `;
            }
        },
        { data: "documenid" },
        {
            data: "documenname",
            render: function(data, type, row) {
                if (!data) return "";
                return data.length > 10 ? data.substring(0, 20) + "..." : data;
            },
        },
        { 
            data: "documenaddress",
            render: function(data, type, row) {
                return `
                    <a href="#" onclick="downloadlink(4,'${row.documenaddress}')" title="Download">${row.documenaddress}</a>
                `;
            }
        },
        { 
            data: "createdon",
            render: function(data, type, row) {
                if (!data) return "";
                let d = new Date(data);
                let day   = ("0" + d.getDate()).slice(-2);
                let month = ("0" + (d.getMonth() + 1)).slice(-2);
                let year  = d.getFullYear();

                return `${day}.${month}.${year}`;
            }
        },
        ],
        pageLength: 10,
        dom: 'Bfrtip',
        buttons: [
        {
            text: 'Tambah Data',
            className: 'btn btn-sm btn-success',
            action: function () {
             redirectlink('md_farkes_doc_create')
            }
        },
        'excel'
        ]
    });
    $('#table_displayfarkes_news').DataTable({
        processing: true,
        serverSide: true,
        ajax: {
        url: "../function/serverside.php",
        type: "POST",
        data: { "table": "table_datafarkes_n" }
        },
        columns: [
        { 
            data: null,
            render: function(data, type, row) {
                return `
                    <a href="#" onclick="redirectlink('md_farkes_news_create','${row.newsid}')" title="Change"><img src="../assets/icon/pencil-white.png"></a> |
                    <a href="#" onclick="delete_news_farkes('${row.newsid}')" title="Delete"><img src="../assets/icon/trash-white.png"></a>
                `;
            }
        },
        { data: "newsid" },
        { data: "newseditor" },
        {
            data: "newstitle",
            render: function(data, type, row) {
                if (!data) return "";
                return data.length > 10 ? data.substring(0, 20) + "..." : data;
            },
        },  
        {
            data: "newscontent",
            render: function(data, type, row) {
            if (!data) return "";
            var plainText = data.replace(/<[^>]*>/g, '');
            return plainText.length > 20 ? plainText.substring(0, 20) + "..." : plainText;
            }
        },
        
        ],
        pageLength: 10,
        dom: 'Bfrtip',
        buttons: [
        {
            text: 'Tambah Data',
            className: 'btn btn-sm btn-success',
            action: function () {
             redirectlink('md_farkes_news_create')
            }
        },
        'excel'
        ]
    });
    $('#table_displayfarkes_img').DataTable({
        processing: true,
        serverSide: true,
        ajax: {
        url: "../function/serverside.php",
        type: "POST",
        data: { "table": "table_datafarkes_g" }
        },
        columns: [
        { 
            data: null,
            render: function(data, type, row) {
                return `
                    <a href="#" onclick="redirectlink('md_farkes_img_create','${row.imgid}')" title="Change"><img src="../assets/icon/pencil-white.png"></a> |
                    <a href="#" onclick="delete_img_farkes('${row.imgid}')" title="Delete"><img src="../assets/icon/trash-white.png"></a>
                `;
            }
        },
        { data: "imgid" },
        { data: "imgthemes" },
        { 
            data: "imgaddress",
            render: function(data, type, row) {
                return `
                    <a href="#" onclick="downloadlink(5,'${row.imgaddress}')" title="Download">${row.imgaddress}</a>
                `;
            }
        },
        { 
            data: "createdon",
            render: function(data, type, row) {
                if (!data) return "";
                let d = new Date(data);
                let day   = ("0" + d.getDate()).slice(-2);
                let month = ("0" + (d.getMonth() + 1)).slice(-2);
                let year  = d.getFullYear();

                return `${day}.${month}.${year}`;
            }
        },
        ],
        pageLength: 10,
        dom: 'Bfrtip',
        buttons: [
        {
            text: 'Tambah Data',
            className: 'btn btn-sm btn-success',
            action: function () {
             redirectlink('md_farkes_img_create')
            }
        },
        'excel'
        ]
    });

        // -----> P2K3
    $('#table_displayp2k3_head').DataTable({
        processing: true,
        serverSide: true,
        ajax: {
        url: "../function/serverside.php",
        type: "POST",
        data: { "table": "table_datap2k3_h" }
        },
        columns: [
        { 
            data: null,
            render: function(data, type, row) {
                return `
                    <a href="#" onclick="redirectlink('md_p2k3_head_create','${row.p2k3id}')" title="Change"><img src="../assets/icon/pencil-white.png"></a> |
                    <a href="#" onclick="delete_head_p2k3('${row.p2k3id}')" title="Delete"><img src="../assets/icon/trash-white.png"></a>
                `;
            }
        },
        { data: "p2k3id" },
        {
            data: "p2k3descriptions",
            render: function(data, type, row) {
            if (!data) return "";
            var plainText = data.replace(/<[^>]*>/g, '');
            return plainText.length > 20 ? plainText.substring(0, 20) + "..." : plainText;
            }
        },
        { data: "p2k3header" },
        { 
            data: "createdon",
            render: function(data, type, row) {
                if (!data) return "";
                let d = new Date(data);
                let day   = ("0" + d.getDate()).slice(-2);
                let month = ("0" + (d.getMonth() + 1)).slice(-2);
                let year  = d.getFullYear();

                return `${day}.${month}.${year}`;
            }
        },
        ],
        pageLength: 10,
        dom: 'Bfrtip',
        buttons: [
        {
            text: 'Tambah Data',
            className: 'btn btn-sm btn-success',
            action: function () {
             redirectlink('md_p2k3_head_create')
            }
        },
        'excel'
        ]
    });
    $('#table_displayp2k3_dokumen').DataTable({
        processing: true,
        serverSide: true,
        ajax: {
        url: "../function/serverside.php",
        type: "POST",
        data: { "table": "table_datap2k3_d" }
        },
        columns: [
        { 
            data: null,
            render: function(data, type, row) {
                return `
                    <a href="#" onclick="redirectlink('md_p2k3_doc_create','${row.documenid}')" title="Change"><img src="../assets/icon/pencil-white.png"></a> |
                    <a href="#" onclick="delete_doc_p2k3('${row.documenid}')" title="Delete"><img src="../assets/icon/trash-white.png"></a>
                `;
            }
        },
        { data: "documenid" },
        {
            data: "documenname",
            render: function(data, type, row) {
                if (!data) return "";
                return data.length > 10 ? data.substring(0, 20) + "..." : data;
            },
        },
        { 
            data: "documenaddress",
            render: function(data, type, row) {
                return `
                    <a href="#" onclick="downloadlink(4,'${row.documenaddress}')" title="Download">${row.documenaddress}</a>
                `;
            }
        },
        { 
            data: "createdon",
            render: function(data, type, row) {
                if (!data) return "";
                let d = new Date(data);
                let day   = ("0" + d.getDate()).slice(-2);
                let month = ("0" + (d.getMonth() + 1)).slice(-2);
                let year  = d.getFullYear();

                return `${day}.${month}.${year}`;
            }
        },
        ],
        pageLength: 10,
        dom: 'Bfrtip',
        buttons: [
        {
            text: 'Tambah Data',
            className: 'btn btn-sm btn-success',
            action: function () {
             redirectlink('md_p2k3_doc_create')
            }
        },
        'excel'
        ]
    });
     $('#table_displayp2k3_news').DataTable({
        processing: true,
        serverSide: true,
        ajax: {
        url: "../function/serverside.php",
        type: "POST",
        data: { "table": "table_datap2k3_n" }
        },
        columns: [
        { 
            data: null,
            render: function(data, type, row) {
                return `
                    <a href="#" onclick="redirectlink('md_p2k3_news_create','${row.newsid}')" title="Change"><img src="../assets/icon/pencil-white.png"></a> |
                    <a href="#" onclick="delete_news_p2k3('${row.newsid}')" title="Delete"><img src="../assets/icon/trash-white.png"></a>
                `;
            }
        },
        { data: "newsid" },
        { data: "newseditor" },
        {
            data: "newstitle",
            render: function(data, type, row) {
                if (!data) return "";
                return data.length > 10 ? data.substring(0, 20) + "..." : data;
            },
        },
        {
            data: "newscontent",
            render: function(data, type, row) {
            if (!data) return "";
            var plainText = data.replace(/<[^>]*>/g, '');
            return plainText.length > 20 ? plainText.substring(0, 20) + "..." : plainText;
            }
        },      
        ],
        pageLength: 10,
        dom: 'Bfrtip',
        buttons: [
        {
            text: 'Tambah Data',
            className: 'btn btn-sm btn-success',
            action: function () {
             redirectlink('md_p2k3_news_create')
            }
        },
        'excel'
        ]
    });
    $('#table_displayp2k3_sidak').DataTable({
        processing: true,
        serverSide: true,
        ajax: {
        url: "../function/serverside.php",
        type: "POST",
        data: { "table": "table_datap2k3_s" }
        },
        columns: [
        { 
            data: null,
            render: function(data, type, row) {
                return `
                    <a href="#" onclick="delete_sidak_p2k3('${row.p2k3id}')" title="Delete"><img src="../assets/icon/trash-white.png"></a>
                `;
            }
        },
        { data: "p2k3id" },
        { data: "tglsidak" },
        { data: "pernr" },
        { data: "unitid" },
        {
            data: "catatan",
            render: function(data, type, row) {
            if (!data) return "";
            var plainText = data.replace(/<[^>]*>/g, '');
            return plainText.length > 20 ? plainText.substring(0, 20) + "..." : plainText;
            }
        }, 
        // { 
        //     data: "imgaddress",
        //     render: function(data, type, row) {
        //         return `
        //             <a href="#" onclick="downloadlink(5,'${row.imgaddress}')" title="Download">${row.imgaddress}</a>
        //         `;
        //     }
        // },
        ],
        pageLength: 10,
        dom: 'Bfrtip',
        buttons: [
        {
            text: 'Tambah Data',
            className: 'btn btn-sm btn-success',
            action: function () {
             redirectlink('md_p2k3_sidak_create')
            }
        },
        'excel'
        ]
    });

         // -----> SIDO
    $('#table_displaysido_head').DataTable({
        processing: true,
        serverSide: true,
        ajax: {
        url: "../function/serverside.php",
        type: "POST",
        data: { "table": "table_datasido_h" }
        },
        columns: [
        { 
            data: null,
            render: function(data, type, row) {
                return `
                    <a href="#" onclick="redirectlink('md_sido_head_create','${row.sidoid}')" title="Change"><img src="../assets/icon/pencil-white.png"></a> |
                    <a href="#" onclick="delete_head_sido('${row.sidoid}')" title="Delete"><img src="../assets/icon/trash-white.png"></a>
                `;
            }
        },
        { data: "sidoid" },
        {
            data: "sidodescriptions",
            render: function(data, type, row) {
            if (!data) return "";
            var plainText = data.replace(/<[^>]*>/g, '');
            return plainText.length > 20 ? plainText.substring(0, 20) + "..." : plainText;
            }
        }, 
        { data: "sidoheader" },
        { 
            data: "createdon",
            render: function(data, type, row) {
                if (!data) return "";
                let d = new Date(data);
                let day   = ("0" + d.getDate()).slice(-2);
                let month = ("0" + (d.getMonth() + 1)).slice(-2);
                let year  = d.getFullYear();

                return `${day}.${month}.${year}`;
            }
        },
        ],
        pageLength: 10,
        dom: 'Bfrtip',
        buttons: [
        {
            text: 'Tambah Data',
            className: 'btn btn-sm btn-success',
            action: function () {
             redirectlink('md_sido_head_create')
            }
        },
        'excel'
        ]
    });
    $('#table_displaysido_dokumen').DataTable({
        processing: true,
        serverSide: true,
        ajax: {
        url: "../function/serverside.php",
        type: "POST",
        data: { "table": "table_datasido_e" }
        },
        columns: [
        { 
            data: null,
            render: function(data, type, row) {
                return `
                    <a href="#" onclick="delete_doc_sido('${row.sidoid}')" title="Delete"><img src="../assets/icon/trash-white.png"></a>
                `;
            }
        },
        { data: "taskid" },
        { data: "eventname" },
        { data: "tgleventfrom" },
        { data: "tgleventto" },
        {
            data: "descriptions",
            render: function(data, type, row) {
            if (!data) return "";
            var plainText = data.replace(/<[^>]*>/g, '');
            return plainText.length > 20 ? plainText.substring(0, 20) + "..." : plainText;
            }
        },
        { 
            data: "createdon",
            render: function(data, type, row) {
                if (!data) return "";
                let d = new Date(data);
                let day   = ("0" + d.getDate()).slice(-2);
                let month = ("0" + (d.getMonth() + 1)).slice(-2);
                let year  = d.getFullYear();

                return `${day}.${month}.${year}`;
            }
        },
        ],
        pageLength: 10,
        dom: 'Bfrtip',
        buttons: [
        {
            text: 'Tambah Data',
            className: 'btn btn-sm btn-success',
            action: function () {
             redirectlink('md_sido_doc_create')
            }
        },
        'excel'
        ]
    });

    // -----> PENGUMUMAN
     $('#table_displaynotice').DataTable({
        processing: true,
        serverSide: true,
        ajax: {
        url: "../function/serverside.php",
        type: "POST",
        data: { "table": "table_datanotice_h" }
        },
        columns: [
        { 
            data: null,
            render: function(data, type, row) {
                return `
                    <a href="#" onclick="redirectlink('adm_notice_head_create','${row.noticeid}')" title="Change"><img src="../assets/icon/pencil-white.png"></a> |
                    <a href="#" onclick="delete_head_notice('${row.noticeid}')" title="Delete"><img src="../assets/icon/trash-white.png"></a>
                `;
            }
        },
        { data: "noticeid" },
        { data: "header" },
        {
            data: "descriptions",
            render: function(data, type, row) {
            if (!data) return "";
            var plainText = data.replace(/<[^>]*>/g, '');
            return plainText.length > 20 ? plainText.substring(0, 20) + "..." : plainText;
            }
        },
        { 
            data: "createdon",
            render: function(data, type, row) {
                if (!data) return "";
                let d = new Date(data);
                let day   = ("0" + d.getDate()).slice(-2);
                let month = ("0" + (d.getMonth() + 1)).slice(-2);
                let year  = d.getFullYear();

                return `${day}.${month}.${year}`;
            }
        },
        ],
        pageLength: 10, // default tampil 10 baris
        dom: 'Bfrtip',
        buttons: [
        {
            text: 'Tambah Data',
            className: 'btn btn-sm btn-success',
            action: function () {
             redirectlink('adm_notice_head_create')
            }
        },
        'excel'
        ]
    });

      // -----> SERAGAM
     $('#table_displayseragam').DataTable({
        processing: true,
        serverSide: true,
        ajax: {
        url: "../function/serverside.php",
        type: "POST",
        data: { "table": "table_datasrgm_h" }
        },
        columns: [
        { 
            data: null,
            render: function(data, type, row) {
                if (row.realisasi === "X") {
                    return `
                    <div class="d-flex align-items-center gap-2">
                        <div class="form-check form-switch m-0">
                        <input class="form-check-input get-checked" type="radio" 
                            name="srgmSwitch" 
                            id="switch_${row.srgmid}" 
                            value="${row.srgmid}" disabled>
                        <label class="form-check-label" for="switch_${row.srgmid}"></label>
                    </div> |
                        <a href="#" onclick="delete_head_srgm('${row.srgmid}')" title="Delete"><img src="../assets/icon/trash-white.png"></a> |
                        <a href="#" onclick="redirectlink('adm_srgm_detail','${row.srgmid}')" title="Show Detail"><img src="../assets/icon/kacamata.png"></a>
                    </div>
                `;
                }else{
                    return `
                    <div class="d-flex align-items-center gap-2">
                        <div class="form-check form-switch m-0">
                        <input class="form-check-input get-checked" type="radio" 
                            name="srgmSwitch" 
                            id="switch_${row.srgmid}" 
                            value="${row.srgmid}">
                        <label class="form-check-label" for="switch_${row.srgmid}"></label>
                    </div> |
                        <a href="#" onclick="delete_head_srgm('${row.srgmid}')" title="Delete"><img src="../assets/icon/trash-white.png"></a> |
                        <a href="#" onclick="redirectlink('adm_srgm_detail','${row.srgmid}')" title="Show Detail"><img src="../assets/icon/kacamata.png"></a>
                    </div>
                `;
                }
                
            }
        },
        { 
            data: "tglfrom",
            render: function(data, type, row) {
                if (!data) return "";
                let d = new Date(data);
                let day   = ("0" + d.getDate()).slice(-2);
                let month = ("0" + (d.getMonth() + 1)).slice(-2);
                let year  = d.getFullYear();
                return `${day}.${month}.${year}`;
            }
        },
        { 
            data: "tglto",
            render: function(data, type, row) {
                if (!data) return "";
                let d = new Date(data);
                let day   = ("0" + d.getDate()).slice(-2);
                let month = ("0" + (d.getMonth() + 1)).slice(-2);
                let year  = d.getFullYear();
                return `${day}.${month}.${year}`;
            }
        },
        { data: "totalranc" },
        { data: "totalreal" },
        {
            data: "catatan",
            render: function(data, type, row) {
            if (!data) return "";
            var plainText = data.replace(/<[^>]*>/g, '');
            return plainText.length > 20 ? plainText.substring(0, 20) + "..." : plainText;
            }
        },
        // { 
        //     data: "rancangan",
        //     render: function(data, type, row) {
        //         if (data === "X") {
        //             return '<span class="badge bg-success">Yes</span>';
        //         } else {
        //             return '<span class="badge bg-danger">No</span>';
        //         }
        //     }
        // },
        // { 
        //     data: "realisasi",
        //     render: function(data, type, row) {
        //         if (data === "X") {
        //             return '<span class="badge bg-success">Yes</span>';
        //         } else {
        //             return '<span class="badge bg-danger">No</span>';
        //         }
        //     }
        // },
        { data: "statsx" },
        { 
            data: "createdon",
            render: function(data, type, row) {
                if (!data) return "";
                let d = new Date(data);
                let day   = ("0" + d.getDate()).slice(-2);
                let month = ("0" + (d.getMonth() + 1)).slice(-2);
                let year  = d.getFullYear();

                return `${day}.${month}.${year}`;
            }
        },
        ],
        pageLength: 10, 
        dom: 'Bfrtip',
        buttons: [
        {
            text: 'Rancangan',
            className: 'btn btn-sm btn-success',
            action: function () {
             redirectlink('adm_seragam_ranc_create')
            }
        },
        {
            text: 'Realisasi',
            className: 'btn btn-sm btn-success',
            action: function () {
            let checked = $(".get-checked:checked");
            if (checked.length === 0) {
                Swal.fire({
                icon: 'warning',
                text: 'Pilih dulu salah satu data!',
                showConfirmButton: false,
                timer: time
                });
                return;
            }
            let srgmid = checked.val();
            redirectlink('adm_seragam_real_create', srgmid);
            }
        },
        // {
        //     text: 'Laporan',
        //     className: 'btn btn-sm btn-success',
        //     action: function () {
        //      redirectlink('adm_seragam_report')
        //     }
        // },
        // 'excel'
        ]
    });

    // -----> PKl
     $('#table_displaypkl').DataTable({
        processing: true,
        serverSide: true,
        ajax: {
        url: "../function/serverside.php",
        type: "POST",
        data: { "table": "table_datapkl_h" }
        },
        columns: [
        { 
            data: null,
            render: function(data, type, row) {
                return `
                    <a href="#" onclick="redirectlink('adm_pkl_create','${row.pklid}')" title="Change"><img src="../assets/icon/pencil-white.png"></a> |
                    <a href="#" onclick="delete_head_pkl('${row.pklid}')" title="Delete"><img src="../assets/icon/trash-white.png"></a>
                `;
            }
        },
        { data: "namaorg" },
        { data: "instansi" },
        { 
            data: "tglfrom",
            render: function(data, type, row) {
                if (!data) return "";
                let d = new Date(data);
                let day   = ("0" + d.getDate()).slice(-2);
                let month = ("0" + (d.getMonth() + 1)).slice(-2);
                let year  = d.getFullYear();
                return `${day}.${month}.${year}`;
            }
        },
        { 
            data: "tglto",
            render: function(data, type, row) {
                if (!data) return "";
                let d = new Date(data);
                let day   = ("0" + d.getDate()).slice(-2);
                let month = ("0" + (d.getMonth() + 1)).slice(-2);
                let year  = d.getFullYear();
                return `${day}.${month}.${year}`;
            }
        },
        { data: "unitdest" },
        { data: "picunit" },
        { data: "jenispkl" },
        {
            data: "catatan",
            render: function(data, type, row) {
            if (!data) return "";
            var plainText = data.replace(/<[^>]*>/g, '');
            return plainText.length > 20 ? plainText.substring(0, 20) + "..." : plainText;
            }
        },
        { 
            data: "createdon",
            render: function(data, type, row) {
                if (!data) return "";
                let d = new Date(data);
                let day   = ("0" + d.getDate()).slice(-2);
                let month = ("0" + (d.getMonth() + 1)).slice(-2);
                let year  = d.getFullYear();

                return `${day}.${month}.${year}`;
            }
        },
        ],
        pageLength: 10, 
        dom: 'Bfrtip',
        buttons: [
         {
            text: 'Tambah Data',
            className: 'btn btn-sm btn-success',
            action: function () {
             redirectlink('adm_pkl_create')
            }
        },
        // {
        //     text: 'Laporan',
        //     className: 'btn btn-sm btn-success',
        //     action: function () {
        //      redirectlink('adm_seragam_report')
        //     }
        // },
        'pdf'
        ]
    });

       // -----> PARCEL
     $('#table_displayparcel').DataTable({
        processing: true,
        serverSide: true,
        ajax: {
        url: "../function/serverside.php",
        type: "POST",
        data: { "table": "table_dataparcel_h" }
        },
        columns: [
        { 
            data: null,
            render: function(data, type, row) {
                if (row.realisasi === "X") {
                    return `
                    <div class="d-flex align-items-center gap-2">
                        <div class="form-check form-switch m-0">
                        <input class="form-check-input get-checked" type="radio" 
                            name="parcelSwitch" 
                            id="switch_${row.parcelid}" 
                            value="${row.parcelid}" disabled>
                        <label class="form-check-label" for="switch_${row.parcelid}"></label>
                    </div> |
                        <a href="#" onclick="delete_head_parcel('${row.parcelid}')" title="Delete"><img src="../assets/icon/trash-white.png"></a> |
                        <a href="#" onclick="redirectlink('adm_parcel_detail','${row.parcelid}')" title="Show Detail"><img src="../assets/icon/kacamata.png"></a>
                    </div>
                `;
                }else{
                    return `
                    <div class="d-flex align-items-center gap-2">
                        <div class="form-check form-switch m-0">
                        <input class="form-check-input get-checked" type="radio" 
                            name="parcelSwitch" 
                            id="switch_${row.parcelid}" 
                            value="${row.parcelid}">
                        <label class="form-check-label" for="switch_${row.parcelid}"></label>
                    </div> |
                        <a href="#" onclick="delete_head_parcel('${row.parcelid}')" title="Delete"><img src="../assets/icon/trash-white.png"></a> |
                        <a href="#" onclick="redirectlink('adm_parcel_detail','${row.parcelid}')" title="Show Detail"><img src="../assets/icon/kacamata.png"></a>
                    </div>
                `;
                }
                
            }
        },
        { 
            data: "tglfrom",
            render: function(data, type, row) {
                if (!data) return "";
                let d = new Date(data);
                let day   = ("0" + d.getDate()).slice(-2);
                let month = ("0" + (d.getMonth() + 1)).slice(-2);
                let year  = d.getFullYear();
                return `${day}.${month}.${year}`;
            }
        },
        { 
            data: "tglto",
            render: function(data, type, row) {
                if (!data) return "";
                let d = new Date(data);
                let day   = ("0" + d.getDate()).slice(-2);
                let month = ("0" + (d.getMonth() + 1)).slice(-2);
                let year  = d.getFullYear();
                return `${day}.${month}.${year}`;
            }
        },
        { data: "totalranc" },
        { data: "totalreal" },
        {
            data: "catatan",
            render: function(data, type, row) {
            if (!data) return "";
            var plainText = data.replace(/<[^>]*>/g, '');
            return plainText.length > 20 ? plainText.substring(0, 20) + "..." : plainText;
            }
        },
        // { 
        //     data: "rancangan",
        //     render: function(data, type, row) {
        //         if (data === "X") {
        //             return '<span class="badge bg-success">Yes</span>';
        //         } else {
        //             return '<span class="badge bg-danger">No</span>';
        //         }
        //     }
        // },
        // { 
        //     data: "realisasi",
        //     render: function(data, type, row) {
        //         if (data === "X") {
        //             return '<span class="badge bg-success">Yes</span>';
        //         } else {
        //             return '<span class="badge bg-danger">No</span>';
        //         }
        //     }
        // },
        { data: "statsx" },
        { 
            data: "createdon",
            render: function(data, type, row) {
                if (!data) return "";
                let d = new Date(data);
                let day   = ("0" + d.getDate()).slice(-2);
                let month = ("0" + (d.getMonth() + 1)).slice(-2);
                let year  = d.getFullYear();

                return `${day}.${month}.${year}`;
            }
        },
        ],
        pageLength: 10, 
        dom: 'Bfrtip',
        buttons: [
        {
            text: 'Rancangan',
            className: 'btn btn-sm btn-success',
            action: function () {
             redirectlink('adm_parcel_ranc_create')
            }
        },
        {
            text: 'Realisasi',
            className: 'btn btn-sm btn-success',
            action: function () {
            let checked = $(".get-checked:checked");
            if (checked.length === 0) {
                Swal.fire({
                icon: 'warning',
                text: 'Pilih dulu salah satu data!',
                showConfirmButton: false,
                timer: time
                });
                return;
            }
            let srgmid = checked.val();
            redirectlink('adm_parcel_real_create', srgmid);
            }
        },
        // {
        //     text: 'Laporan',
        //     className: 'btn btn-sm btn-success',
        //     action: function () {
        //      redirectlink('adm_seragam_report')
        //     }
        // },
        // 'excel'
        ]
    });

        // -----> SURAT
     $('#table_displaysurat').DataTable({
        processing: true,
        serverSide: true,
        ajax: {
        url: "../function/serverside.php",
        type: "POST",
        data: { "table": "table_datasurat_h" }
        },
        columns: [
        { 
            data: null,
            render: function(data, type, row) {
                    return `
                        <a href="#" onclick="redirectlink('adm_surat_create','${row.suratid}')" title="Change"><img src="../assets/icon/pencil-white.png"></a> |
                        <a href="#" onclick="delete_head_surat('${row.suratid}')" title="Delete"><img src="../assets/icon/trash-white.png"></a> |
                        <a href="#" onclick="redirectlink('adm_surat_detail','${row.suratid}')" title="Show Detail"><img src="../assets/icon/kacamata.png"></a>
                `;   
            }
        },
        { data: "suratid" },
        { data: "kopheader" },
        { 
            data: "terbit",
            render: function(data, type, row) {
                if (!data) return "";
                let d = new Date(data);
                let day   = ("0" + d.getDate()).slice(-2);
                let month = ("0" + (d.getMonth() + 1)).slice(-2);
                let year  = d.getFullYear();
                return `${day}.${month}.${year}`;
            }
        },
        { data: "pernr" },
        { data: "unitid" },
        { 
            data: "createdon",
            render: function(data, type, row) {
                if (!data) return "";
                let d = new Date(data);
                let day   = ("0" + d.getDate()).slice(-2);
                let month = ("0" + (d.getMonth() + 1)).slice(-2);
                let year  = d.getFullYear();

                return `${day}.${month}.${year}`;
            }
        },
        ],
        pageLength: 10, 
        dom: 'Bfrtip',
        buttons: [
        {
            text: 'Buat Surat',
            className: 'btn btn-sm btn-success',
            action: function () {
             redirectlink('adm_surat_create')
            }
        },
        'pdf'
        ]
    });
    
    


    // -----> Database
    $('#myTable_database').DataTable({
        paging: true,           // Aktifkan pagination
        searching: true,        // Aktifkan fitur pencarian
        ordering: true,         // Aktifkan fitur urut
        info: true,             // Tampilkan info "Showing x of y entries"
        lengthChange: false,     // Tampilkan pilihan jumlah data per halaman
        pageLength: 10,         // Jumlah data default per halaman
        responsive: true,       // Buat tabel jadi responsif
        autoWidth: false,        // Jangan otomatis atur lebar kolom
        language: {
        search: "🔍Cari data" // kosongkan label
    },
        })
});