<!DOCTYPE html>
<html>

<head>
    <title>Customer Box Preview</title>
    <link rel="stylesheet" href="styles.css">
</head>

<body>
    <div class="top-bar-container">
        <b class="uthangs">Uthangs</b>
        <div style="display: flex;">
            <button class="top-bar-btn">Home</button>
            <button class="top-bar-btn">About</button>
            <button class="top-bar-btn">Log out</button>
        </div>
    </div>
    <div class="customer-box-preview-container">
        <div style="display:flex; flex-direction: column;">
            <div class="customer-box-preview-left-side-container">
                <img class="profile-logo" src="img\profile-logo.png" alt="Profile Logo">
                <div>
                    <p>Name:</p>
                    <p>Phone#:</p>
                    <p>Address:</p>
                    <p>Last Updated:</p>
                </div>
            </div>
            <div class="total-balance">
                <b>TOTAL BALANCE:</b>
                <b>₱:</b>
            </div>
        </div>
        <div class="customer-box-preview-right-side-container">
            <div class="record-btn-container">
                <b class="customer-box-preview-record">RECORDS</b>
                <div class="customer-box-review-btn-container">
                    <button class="customer-box-review-btn">Edit Record</button>
                    <button class="customer-box-review-btn">Pay All</button>
                </div>
            </div>
            <div class="customer-box-preview-table">
                <table>
                    <tr class="table-head">
                        <th>Item</th>
                        <th>Quantity</th>
                        <th>Price</th>
                        <th>Total</th>
                    </tr>
                    <tr>
                        <!-- items -->
                        <td><input type="text"></input></td>
                        <!-- quantity -->
                        <td><input type="text"></input></td>
                        <!-- price -->
                        <td><input class="readOnly-input" type="text" readonly></input></td>
                        <!-- Total -->
                        <td><input class="readOnly-input" type="text" readonly></input></td>
                    </tr>
                    <tr>
                        <!-- items -->
                        <td><input type="text"></input></td>
                        <!-- quantity -->
                        <td><input type="text"></input></td>
                        <!-- price -->
                        <td><input class="readOnly-input" type="text" readonly></input></td>
                        <!-- Total -->
                        <td><input class="readOnly-input" type="text" readonly></input></td>
                    </tr>
                    <tr>
                        <!-- items -->
                        <td><input type="text"></input></td>
                        <!-- quantity -->
                        <td><input type="text"></input></td>
                        <!-- price -->
                        <td><input class="readOnly-input" type="text" readonly></input></td>
                        <!-- Total -->
                        <td><input class="readOnly-input" type="text" readonly></input></td>
                    </tr>
                    <tr>
                        <!-- items -->
                        <td><input type="text"></input></td>
                        <!-- quantity -->
                        <td><input type="text"></input></td>
                        <!-- price -->
                        <td><input class="readOnly-input" type="text" readonly></input></td>
                        <!-- Total -->
                        <td><input class="readOnly-input" type="text" readonly></input></td>
                    </tr>
                    <tr>
                        <!-- items -->
                        <td><input type="text"></input></td>
                        <!-- quantity -->
                        <td><input type="text"></input></td>
                        <!-- price -->
                        <td><input class="readOnly-input" type="text" readonly></input></td>
                        <!-- Total -->
                        <td><input class="readOnly-input" type="text" readonly></input></td>
                    </tr>
                    <tr>
                        <!-- items -->
                        <td><input type="text"></input></td>
                        <!-- quantity -->
                        <td><input type="text"></input></td>
                        <!-- price -->
                        <td><input class="readOnly-input" type="text" readonly></input></td>
                        <!-- Total -->
                        <td><input class="readOnly-input" type="text" readonly></input></td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
    </div>
</body>

</html>