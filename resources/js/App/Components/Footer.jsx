

import React from 'react';
import { motion } from 'framer-motion';
import { 
  Facebook, 
  Twitter, 
  Linkedin, 
  Instagram, 
  Mail,
  GraduationCap,
  BookOpen,
  Users,
  Shield
} from 'lucide-react';

const Footer = () => {
  const container = {
    hidden: { opacity: 0 },
    visible: {
      opacity: 1,
      transition: {
        staggerChildren: 0.15,
        delayChildren: 0.3,
      },
    },
  };

  const item = {
    hidden: { opacity: 0, y: 20 },
    visible: {
      opacity: 1,
      y: 0,
      transition: {
        ease: "anticipate",
        duration: 0.8,
      },
    },
  };

  const quickLinks = [
    { title: 'Certifications', icon: GraduationCap },
    { title: 'Resources', icon: BookOpen },
    { title: 'Community', icon: Users },
    { title: 'Trust & Safety', icon: Shield }
  ];

  return (
    <motion.footer 
      className="bg-white border-t border-gray-100"
      variants={container}
      initial="hidden"
      whileInView="visible"
      viewport={{ once: true }}
    >
      <div className="container mx-auto px-4 py-16">
        <div className="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-12">
          {/* Brand Column */}
          <motion.div variants={item} className="space-y-6">
            <div>
              <h3 className="text-xl font-bold bg-clip-text text-transparent bg-gradient-to-r from-blue-600 to-purple-600">
                LSP 40
              </h3>
              <p className="mt-4 text-gray-600">
                Empowering professionals with BNSP-certified excellence
              </p>
            </div>
            <div className="flex space-x-4">
              <Facebook className="w-5 h-5 text-gray-400 hover:text-blue-600 cursor-pointer transition-colors" />
              <Twitter className="w-5 h-5 text-gray-400 hover:text-blue-600 cursor-pointer transition-colors" />
              <Linkedin className="w-5 h-5 text-gray-400 hover:text-blue-600 cursor-pointer transition-colors" />
              <Instagram className="w-5 h-5 text-gray-400 hover:text-blue-600 cursor-pointer transition-colors" />
            </div>
          </motion.div>

          {/* Quick Links */}
          <motion.div variants={item}>
            <h3 className="font-semibold mb-6">Quick Links</h3>
            <ul className="space-y-4">
              {quickLinks.map((link, index) => (
                <li key={index}>
                  <a href="#" className="flex items-center text-gray-600 hover:text-blue-600 transition-colors">
                    <link.icon className="w-4 h-4 mr-2" />
                    {link.title}
                  </a>
                </li>
              ))}
            </ul>
          </motion.div>

          {/* Contact */}
          <motion.div variants={item}>
            <h3 className="font-semibold mb-6">Contact Us</h3>
            <div className="space-y-4">
              <p className="flex items-center text-gray-600">
                <Mail className="w-4 h-4 mr-2" />
                contact@lsp40.com
              </p>
              <button className="px-6 py-2 rounded-lg bg-blue-50 text-blue-600 hover:bg-blue-100 transition-colors">
                Get Support
              </button>
            </div>
          </motion.div>

          {/* Newsletter */}
          <motion.div variants={item}>
            <h3 className="font-semibold mb-6">Stay Updated</h3>
            <div className="bg-blue-50 p-6 rounded-xl">
              <p className="text-sm text-gray-600 mb-4">
                Subscribe to our newsletter for certification updates
              </p>
              <input 
                type="email" 
                placeholder="Enter your email"
                className="w-full px-4 py-2 rounded-lg mb-3 border border-gray-200 focus:outline-none focus:border-blue-600"
              />
              <button className="w-full px-4 py-2 rounded-lg bg-gradient-to-r from-blue-600 to-purple-600 text-white hover:opacity-90 transition-opacity">
                Subscribe
              </button>
            </div>
          </motion.div>
        </div>

        {/* Bottom Bar */}
        <motion.div 
          variants={item}
          className="mt-16 pt-8 border-t border-gray-100"
        >
          <div className="flex flex-col md:flex-row justify-between items-center">
            <p className="text-sm text-gray-600">
              © {new Date().getFullYear()} LSP 40. All rights reserved.
            </p>
            <div className="mt-4 md:mt-0 flex gap-6 text-sm text-gray-600">
              <a href="#" className="hover:text-blue-600 transition-colors">Privacy Policy</a>
              <a href="#" className="hover:text-blue-600 transition-colors">Terms of Service</a>
              <a href="#" className="hover:text-blue-600 transition-colors">Cookie Policy</a>
            </div>
          </div>
        </motion.div>
      </div>
    </motion.footer>
  );
};

export default Footer;
