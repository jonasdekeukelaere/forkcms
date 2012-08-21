load "deploy" if respond_to?(:namespace) # cap2 differentiator

# development information
set :client,  "sumo"					# eg: "dev"
set :project, "fork"					# eg: "site"

# production information, ignore these items during development
set :production_url, ""				# eg: "http://fork.sumocoders.be"
set :production_account, ""			# eg: "sumocoders"
set :production_hostname, ""		# eg: "web01.crsolutions.be"
set :production_document_root, ""	# eg: "/home/#{production_account}/#{production_url.gsub("http://","")}"

# repo information
set :repository, "git@github.com:sumocoders/forkcms.git"					# eg: "git@github.com:sumocoders/forkcms.git"

# stages
set :stages, %w{production staging}
set :default_stage, "staging"
set :stage_dir, "deployment"

require "capistrano/ext/multistage"
require "forkcms_3_deploy"
require "forkcms_3_deploy/defaults"
require "sumodev_deploy"