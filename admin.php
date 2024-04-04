<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
<body>
    <div class="container mt-5">
        <h2 class="text-center mb-4">Admin Panel</h2>
        <div class="row">
            <div class="col-md-6">
              <h4>Tambah Game</h4>
              <form id="addGameForm" method="POST" enctype="multipart/form-data">
                <div class="mb-3">
                  <label for="game_name" class="form-label">Nama Game</label>
                  <input type="text" class="form-control" id="game_name" name="game_name" required>
                </div>
                <div class="mb-3">
                  <label for="game_description" class="form-label">Deskripsi Game</label>
                  <textarea class="form-control" id="game_description" name="game_description" rows="3" required></textarea>
                </div>
                <div class="mb-3">
                  <label for="game_image" class="form-label">Gambar Game</label>
                  <input type="file" class="form-control" id="game_image" name="game_image" required accept="image/*">
                </div>
                <button type="submit" class="btn btn-primary">Tambah Game</button>
              </form>
            </div>
        </div>
</body>
</html>
