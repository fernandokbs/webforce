<template>
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse d-flex justify-content-between" id="navbarTogglerDemo01">
          <div>
            <a class="navbar-brand" href="/">WebForce HQ</a>
          </div>
          <div>
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <router-link :to="{ name: 'login' }" class="nav-link active">Login</router-link>
              </li>
              <li class="nav-item">
                <router-link :to="{ name: 'register' }" class="nav-link active">Register</router-link>
              </li>
            </ul>
          </div>
        </div>
    </div>
  </nav>
</template>