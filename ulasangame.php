<div class="row mt-5">
            <div class="col-md-6">
                <h4>Ulasan Game</h4>
                <form id="addReviewForm" method="POST">
                    <div class="mb-3">
                        <label for="review_game" class="form-label">Nama Game</label>
                        <input type="text" class="form-control" id="review_game" name="review_game" required>
                    </div>
                    <div class="mb-3">
                        <label for="game_review" class="form-label">Ulasan Game</label>
                        <textarea class="form-control" id="game_review" name="game_review" rows="3" required></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Tambah Ulasan</button>
                </form>
            </div>