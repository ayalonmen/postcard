# General Settings
set :application, "postcard"
set :domain,      "#{application}.john-benz.com"
set :deploy_to,   "/var/www/#{domain}"
set :app_path,    "app"
set :web_path,    "web"
set :user,        "john"
default_run_options[:pty] = true

# Permissions
set :use_sudo, 			false
set :writable_dirs,     ["app/cache", "app/logs", "web/uploads"]
set :webserver_user,    "www-data"
set :permission_method, :acl

# Set some paths to be shared between versions
set :shared_files,    ["app/config/parameters.yml"]
set :shared_children, ["app/logs", "app/cache" , "web/uploads", "vendor"]

# Git Repository
set :repository,  "git@github.com:johnbenz13/postcard.git"
set :scm,         :git
set :branch, "dev"
ssh_options[:forward_agent] = true #Use the ssh key on local to connect to github
set :deploy_via,	:remote_cache #Keep a copy of git repo on prod and fetch changes only

# Database
set :model_manager, "doctrine"

# Vendors
set :use_composer, true

role :web,        domain                         # Your HTTP server, Apache/etc
role :app,        domain                         # This may be the same as your `Web` server
role :db,         domain, :primary => true       # This is where Symfony2 migrations will run

set  :keep_releases,  3

# Be more verbose by uncommenting the following line
logger.level = Logger::MAX_LEVEL

# Deploy the prod parameter.yml
task :upload_parameters do
  origin_file = "app/config/parameters.prod.yml"
  destination_file = shared_path + "/app/config/parameters.yml"

  try_sudo "mkdir -p #{File.dirname(destination_file)}"
  top.upload(origin_file, destination_file)
end

after "deploy:setup", "upload_parameters"
