# COSC349_AssignmentOne

This is a project that contains three Virtual Machines (VMs), in which are ran off of Vagrant and VirtualBox.

Download Instructions:

In order to reassemble this project, you must have two relatively basic applications downloaded. Vagrant and VirtualBox. Both are servicable on Mac OS, Windows, Linux.. Personally, in order for these files to work efficiently, I would recommend downloading my installed versions.

Vagrant: https://www.vagrantup.com/downloads Newest VERSION 2.2.18
--> My Installed VERSION 2.2.7
VirtualBox: https://www.virtualbox.org/wiki/Downloads Newest Version 6.1.26
--> My Installed VERSION 6.1.16

GitClone Instructions:
To gain access to these files from your own personal computer, use the terminal (cmd) and type the following:
git clone https://github.com/fkraayvanger/COSC349_AssignmentOne CHOSENDIRECTORY

This command will download all the necessary files for the project.

ZipFile Instructions:
If GitClone is not functioning, you may use the following command to download a zip file of the project.
Open a broswer and type:
https://github.com/fkraayvanger/COSC349_AssignmentOne/archive/main.zip

VM Instructions:
--> After the project has been cloned or downloaded, find the directory in which it has been downloaded or cloned into
--> Use the command: vagrant up 
This command will launch all three Virtual Machines and allow full access to the VMs.

Webservers:
To venture into the customer facing website, head to:
--> 192.168.2.11
This website has two sections the HomePage and the DogPage, the DogPage contains the information from the database about the adoptee dogs.

To venture into the admin facing website, head to:
--> 192.168.2.13
This website also has two sections, HomePage and DogPage, but the DogPage contains additional information about the dogs in comparison to the customer facing website.

