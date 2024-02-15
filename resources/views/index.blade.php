<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
</head>
<body>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Negara Asal</th>
                <th>Nama</th>
                <th>Id Manufaktur</th>
                <th>Nama Manufaktur</th>
                <th>Tipe Kendaraan</th>
            </tr>
        </thead>
        <tbody id="data-table">
        </tbody>
    </table>

    <script>
        const dataTable = document.getElementById('data-table')
        let trOpen = '<tr>'
        let trClose = '</tr>'
        let noCol = ''
        let countryCol = ''
        let nameCol = ''
        let idManCol = ''
        let manNameCol = ''
        let vehicleTypesCol = ''
        let no = 1
        axios.get('https://vpic.nhtsa.dot.gov/api/vehicles/getallmanufacturers?format=json')
        .then(function (response) {
            const result = response.data.Results
            result.forEach(data => {
                noCol = `<td>${no}</td>`
                countryCol = `<td>${data.Country}</td>`
                nameCol = `<td>${data.Mfr_CommonName}</td>`
                idManCol = `<td>${data.Mfr_ID}</td>`
                manNameCol = `<td>${data.Mfr_Name}</td>`
                vehicleTypesCol = '<td>'
                data.VehicleTypes.forEach(v => {
                    vehicleTypesCol += (v.Name + ', ')
                });
                vehicleTypesCol += '</td>'

                row = trOpen + noCol + countryCol + nameCol + idManCol + manNameCol + vehicleTypesCol
                dataTable.innerHTML += row
                no += 1
            });
        }).catch(function (error) {
            console.log(error)
        })
    </script>
</body>
</html>