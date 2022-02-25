<!-- Une card -->
<div class="col">
  <div class="card" style="width: 18rem;">
    <div class="card-body">
      <h5 class="card-title">
        <?php echo $user['name'] . ' - ' . $user['age']; ?>
      </h5>
      <p class="card-text">
        <?php echo $user['description']; ?>
      </p>
      <a href="#" class="btn btn-primary">Voir le profil</a>
    </div>
  </div>
</div>
<!-- Fin card -->