set :application, "postcard"
set :domain,      "#{application}.john-benz.com"
set :deploy_to,   "/var/www/#{domain}"
set :app_path,    "app"
set :web_path,    "web"
set :user,        "john"

# Git Repository
set :repository,  "git@github.com:johnbenz13/postcard.git"
set :scm,         :git
set :branch, "master"
ssh_options[:forward_agent] = true

# Database
set :model_manager, "doctrine"

# Vendors
set :use_composer, true

role :web,        domain                         # Your HTTP server, Apache/etc
role :app,        domain                         # This may be the same as your `Web` server
role :db,         domain, :primary => true       # This is where Symfony2 migrations will run

set  :keep_releases,  3

# Be more verbose by uncommenting the following line
# logger.level = Logger::MAX_LEVEL
