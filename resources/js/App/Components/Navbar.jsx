import { Link, usePage, useForm } from "@inertiajs/react"
import { useState, useRef, useEffect } from "react"
import { motion, AnimatePresence } from "framer-motion" 
import { User, LogOut, LayoutDashboard } from "lucide-react" 

const Navbar = ({ url }) => {
    const { auth } = usePage().props
    const { post, processing } = useForm()
    const [dropdownOpen, setDropdownOpen] = useState(false)
    const dropdownRef = useRef(null)

    const logout = () => post('/logout')

    useEffect(() => {
        const handleClickOutside = (event) => {
            if (dropdownRef.current && !dropdownRef.current.contains(event.target)) {
                setDropdownOpen(false)
            }
        }

        document.addEventListener("mousedown", handleClickOutside)
        return () => {
            document.removeEventListener("mousedown", handleClickOutside)
        }
    }, [])

    const dropdownVariants = {
        hidden: { opacity: 0, y: -10 },
        visible: { opacity: 1, y: 0 },
    }

    return (
        <header className="text-black">
            <nav className="container mx-auto flex items-center justify-between p-4 font-semibold">
                <div>
                    <Link href="/" className='font-semibold text-2xl'>LSP 40</Link>
                </div>
                <div className="flex text-center items-center">
                    <Link href="/" className={`${url === '/' ? 'bg-slate-200 p-1 px-2 rounded' : 'hover:bg-slate-100 p-1 px-2 rounded'}`}>Home</Link>
                    <Link href="/informasi" className={`ml-4 ${url === '/informasi' ? 'bg-slate-200 p-1 px-2 rounded' : 'hover:bg-slate-100 p-1 px-2 rounded'}`}>Informasi</Link>
                    <Link href="/sertifikasi" className={`ml-4 ${url === '/sertifikasi' ? 'bg-slate-200 p-1 px-2 rounded' : 'hover:bg-slate-100 p-1 px-2 rounded'}`}>Sertifikasi</Link>
                </div>
                <div className="relative" ref={dropdownRef}>
                    {auth.user ? (
                        <div className="relative">
                            <button
                                onClick={() => setDropdownOpen(!dropdownOpen)}
                                className="flex items-center px-6 py-2 rounded-md bg-blue-600 text-white font-medium hover:bg-blue-700 transition-colors"
                            >
                                <User className="mr-2" /> 
                                {auth.user.username}
                            </button>
                            <AnimatePresence>
                                {dropdownOpen && (
                                    <motion.div
                                        initial="hidden"
                                        animate="visible"
                                        exit="hidden"
                                        variants={dropdownVariants}
                                        className="absolute right-0 mt-2 w-48 bg-white border rounded-md shadow-lg z-10"
                                    >
                                        <a href="/dashboard" className="flex items-center px-4 py-2 text-black hover:bg-slate-100">
                                            <LayoutDashboard size={18} className="mr-2" />
                                            Go to Dashboard
                                        </a>
                                        <hr />
                                        <button
                                            onClick={logout}
                                            disabled={processing}
                                            className="flex items-center w-full text-left px-4 py-2 text-red-600 hover:bg-slate-100"
                                        >
                                            <LogOut size={18} className="mr-2" />
                                            Logout
                                        </button>
                                    </motion.div>
                                )}
                            </AnimatePresence>
                        </div>
                    ) : (
                        <a href="/login" className="px-6 py-2 rounded-md bg-blue-600 text-white font-medium hover:bg-blue-700 transition-colors">Login</a>
                    )}
                </div>
            </nav>
        </header>
    )
}

export default Navbar
