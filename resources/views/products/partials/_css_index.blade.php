<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.10.22/datatables.min.css"/>

<style>
    #addProductForm {
        width: 80%;
        border:  1px solid grey;
        margin: 10px auto;
    }

    #addProductForm label.hidden {
        display: none;
    }

    .plus {
        display: inline-block;
        background-color: #007BFF;
        color: white;
        font-size: 24px;
        line-height: 24px;
        text-align: center;
    }

    .plus:hover {
        background-color: #0069D9;
    }

    .plus::before {
        content: "+";
    }

    #inventoryTable_length, #inventoryTable_info {
        text-align: left;
    }
</style>
