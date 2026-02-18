<style>
    .btn-pdf {
        background-color: #4f46e5 !important;
        color: #ffffff !important;
        font-weight: 600;
        padding: 0.5rem 1rem;
        border-radius: 0.375rem;
        box-shadow: 0 1px 3px rgba(0,0,0,.2);
        text-decoration: none;
        transition: all .2s ease-in-out;
    }

    .btn-pdf:hover {
        background-color: #4338ca !important;
        box-shadow: 0 4px 6px rgba(0,0,0,.25);
        transform: translateY(-1px);
    }

    /* =========================
       CONTENEDOR PDF
    ========================= */
    #pdf-content{
        padding: 30mm 20mm 20mm 20mm;
        background:#fff !important;
        color:#000 !important;
        width:100%;
        margin:auto;
    }

    /* =========================
       TABLA
    ========================= */
    #pdf-content table{
        width:100%;
        border-collapse:collapse;
        table-layout:fixed;
        font-size:12px;
    }

    thead{
        display: table-header-group;
    }

    thead th{
        background:#000 !important;
        color:#fff !important;
        font-weight:600;
    }

    tbody td{
        background:#fff !important;
        color:#000 !important;
    }

    tr{
        page-break-inside: avoid;
    }

    th, td{
        border:1px solid #ddd;
        padding:6px;
        word-break: break-word;
        overflow-wrap: break-word;
        white-space: normal;
    }

    .col-dep   { width:22%; }
    .col-tipo  { width:18%; }
    .col-marca { width:18%; }
    .col-det   { width:42%; }
</style>
