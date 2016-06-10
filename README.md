
Newborn7
===========================

#### Install

1. Install [VirtualBox](https://www.virtualbox.org/wiki/Downloads)
2. Install [Vagrant](https://www.vagrantup.com/downloads.html)
3. Create GitHub [personal API token](https://github.com/blog/1509-personal-api-tokens)
3. Prepare project:

   ```bash
   git clone https://github.com/khonkaen-hospital/newborn7.git
   cd newborn7/vagrant/config
   cp vagrant-local.example.yml vagrant-local.yml
   ```

4. Place your GitHub personal API token to `vagrant-local.yml`
5. Change directory to project root:

   ```bash
   cd newborn7
   ```

5. Run commands:

   ```bash
   vagrant plugin install vagrant-hostmanager
   vagrant up
   ```

That's all. You just need to wait for completion! After that you can access project locally by URLs:
* Api: http://y2aa-api.dev
* Frontend: http://y2aa-frontend.dev
* Backend: http://y2aa-backend.dev
