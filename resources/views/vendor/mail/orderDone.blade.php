<!DOCTYPE html>
<html>
<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<style>
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
}

tr:nth-child(even) {
  background-color: #dddddd;
}
</style>
</head>
<body>

<h2>Details order</h2>
<table class="table">
  <thead class="table-dark">
  <tr>
    <th>Product name</th>
    <th>Quantity</th>
    <th>Total price</th>
    <th>Code</th>
  </tr>
  </thead>
  <tbody>
  @foreach ($carts as $item)
  <tr>
    <td>{{$item->product->title}}</td>
    <td>{{$item->quantity}}</td>
    <td>{{$item->totalPrice}}</td>
    <td><?php echo mt_rand(1000000000000,9999999999999); ?></td>
  </tr>
  @endforeach
  </tbody>
</table>

</body>
</html>

