## Clone project and create .env file

clone repository 

<pre><code>https://github.com/Downs-Jacob/warhammer_scoretracker.git</pre></code>

To generate a .env - open the .env.example file located in the project directory - duplicate it - and rename it to .env

## Install Homestead
<pre><code>git clone https://github.com/laravel/homestead.git ~/Homestead</code></pre>

After cloning the Laravel Homestead repository, you should checkout the release branch. This branch always contains the latest stable release of Homestead:

<pre><code>cd ~/Homestead
git checkout release</code></pre>

Now initialize the homestead.yaml file 

// macOS / Linux...
<pre><code>bash init.sh</pre></code>

// Windows...
<pre><code>init.bat</pre></code>

## Download and install virtual box

https://www.virtualbox.org/wiki/Downloads



## Configuring Homestead.yaml file for sharing the repository to homestead

>find the path of the cloned repository. You will need to add it to the Homestead.yaml file
>folders:<br>
>      example:<br>
>        -map: ~/code/scoretracker<br>
>        -to: /home/vagrant/scoretracker<br>
><br>
>sites:
>    - map: scoretracker.test<br>
>    - to: /home/vagrant/project/public

now add this information to the host file of your machine.

>192.168.10.10 scoretracker.test

# Homebrew and Vagrant
In order to use Homestead you will need Homebrew and Vagrant. If you have these already you can skip this section.

<pre><code>ruby -e "$(curl -fsSL https://raw.githubusercontent.com/Homebrew/install/master/install)"</pre></code>

to install vagrant
<pre><code>brew install vagrant</pre></code>

# Generate a private key for VM

<pre><code>Generate a ssh key 
ssh-keygen -t rsa -b 4096 -C "your_email@example.com"
Start ssh agent 
eval "$(ssh-agent -s)"
Add your SSH private key to the ssh-agent 
ssh-add -k ~/.ssh/id_rsa
</pre></code>

If ssh does not work : Check this out https://github.com/lionheart/openradar-mirror/issues/15361

# Virtual Machine 
start the virtual machine up
<pre><code>vagrant up</pre></code>

First time running should take a few minutes you may also need to open the virtual machine application up. 

Once the vm is running: 

<pre><code>vagrant ssh</pre></code>

once you are in the vm, cd into the directory of the project and run the following commands. 

<pre><code>composer update</pre></code>

# Setup database 

A homestead database is configured for both MySQL and PostgreSQL out of the box. To connect to your MySQL or PostgreSQL database from your host machine's database client, you should connect to 127.0.0.1 on port 33060 (MySQL) or 54320 (PostgreSQL). The username and password for both databases is homestead / secret.

Once you have connected to the database you should be able to run the following code in your VM project folder
<pre><code>php artisan: migrate</pre></code>


